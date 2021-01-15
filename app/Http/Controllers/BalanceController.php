<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationForm; 
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\BalanceModel;
use App\Models\UsersModel;

class BalanceController extends Controller
{
    public function __construct()
    {
        $this->balanceModel = new BalanceModel;
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
        return view('pages/balance', $data);
    }
    
    public function post(ValidationForm $request)
    {
        $userData = Auth::user();

        $status = $this->randomizeStatus();

        $data = array(
            'user_id' => $userData->id,
            'mobile_number' => $request->mobile_number,
            'value' => $request->value,
            'status' => $status
        );

        
        if($status == "success"){
            $dataBalance = array(
                'userData' => $userData,
                'request' => $request
            );
            $this->addBalance($dataBalance);
        }
        
        if($this->balanceModel->store($data)){
            return back()->withErrors([
                'succ' => 'Success adding your balance.'
            ]);
        }else{
            return back()->withErrors([
                'err' => 'Error while proccess your request.'
            ]);
        }
    }

    public function addBalance($dataUser)
    {
        $data = array(
            'id' => $dataUser['userData']->id,
            'balance' => $dataUser['request']->value+$dataUser['userData']->balance
        );
        if ($this->usersModel->edit($data)){
            return true;
        }else{
            dd("err");
        }
    }

    public function randomizeStatus()
    {
        date_default_timezone_set("Asia/Bangkok");
        $timeNow = date('H');
        $rand = 0;
        if($timeNow >= 9 && $timeNow <= 17){
            $rand = (rand(0,9) < 8 ? 1 : 0);
        }else {
            $rand = (rand(0,9) < 3 ? 1 : 0);
        }
        
        if($rand == 0){
            return "failed";
        }else{
            return "success";
        }
    }
}
