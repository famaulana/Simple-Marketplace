<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductModel extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','no_order','product','ship_address','price','status'];

    public function getHistory()
    {
        $dataOrder = $this->getOrder();
        $dataSort = array();
        
        foreach($dataOrder as $data){
            // dd($data->no_order);
            $dataCollect = array(
                'nomor' => $data->no_order,
                'price' => $data->price,
                'name'  => $data->product,
                'status'=> $data->status
            );
            array_push($dataSort, $dataCollect);
        }
        
        return $dataSort;
    }

    public function getOrder()
    {
        $userData = Auth::user();

        $order = ProductModel::where('user_id', $userData->id)->get();

        return $order;
    }

    public function findItemByNoOrder($id)
    {
        $data = ProductModel::where('no_order',$id)->first();
        return $data;
    }

    public function getUnpaidOrder()
    {
        $userData = Auth::user();

        $order = ProductModel::where('user_id', $userData->id)->where('status', 'pending')->get();

        return $order;
    }

    public function store($data)
    {
        $store = new ProductModel;
        if($store->create($data)){
            return true;
        }else{
            return false;
        };
        
    }

    public function edit($data)
    {
        $edit = ProductModel::find($data['id']);
        // dd($data);
        if($edit->update($data)){
            return true;
        }else{
            return false;
        }
    }
}
