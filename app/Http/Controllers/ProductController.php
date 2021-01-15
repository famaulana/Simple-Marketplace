<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationForm; 
use Illuminate\Support\Facades\Auth;
use App\Models\ProductModel;
use App\Models\UsersModel;

class ProductController extends Controller
{
    public function  __construct()
    {
        $this->productModel = new ProductModel;
        $this->usersModel = new UsersModel;
    }

    public function index()
    {
        $userData = Auth::user();
        
        if(empty($userData->id)){
            return redirect('/login');
        }

        $data = array(
            'userName' => $userData->name,
            'userBalance' => $userData->balance,
        );
        return view('pages/product', $data);
    }

    public function successOrder($id)
    {
        $userData = Auth::user();
        
        $dataProduct = $this->productModel->findItemByNoOrder($id);

        $data = array(
            'userName' => $userData->name,
            'userBalance' => $userData->balance,
            'data' =>$dataProduct,
        );
        return view('pages/successOrder', $data);
    }

    public function pay($id)
    {
        $userData = Auth::user();
        
        $dataProduct = $this->productModel->findItemByNoOrder($id);

        $data = array(
            'userName' => $userData->name,
            'userBalance' => $userData->balance,
            'data' =>$dataProduct,
        );
        return view('pages/pay', $data);
    }

    public function payProcess(Request $request)
    {
        $userData = Auth::user();

        
        $dataProduct = $this->productModel->findItemByNoOrder($request->no_order);

        $status;

        if($userData->balance > $dataProduct->price){
            $data = array(
                'id' => $userData->id,
                'balance' => $userData->balance - $dataProduct->price
            );
            $this->usersModel->edit($data);

            $status = "success";
        }else{
            $status = "canceled";
        }

        $data = array(
            'id' => $dataProduct->id,
            'status' => $status
        );
        if($this->productModel->edit($data)){
            return redirect('/product');
        }else{
            dd("rr");
        };
    }

    public function post(Request $request)
    {
        $userData = Auth::user();

        $data = array(
            'user_id' => $userData->id,
            'no_order' => rand(1000000000,9999999999),
            'product' => $request->product,
            'ship_address' => $request->ship_address,
            'price' => $request->price,
            'status' => "pending",
        );

        if($this->productModel->store($data)){
            return redirect('/product/'.$data['no_order']);
        }else{
            return back()->withErrors([
                'err' => 'Sorry your transaction failed, please try again!!'
            ]);
        }
    }
}
