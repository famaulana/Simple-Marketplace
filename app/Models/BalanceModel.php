<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BalanceModel extends Model
{
    protected $table = 'Balance';
    protected $fillable = ['user_id','mobile_number','value','status'];

    public function store($data)
    {
        $store = new BalanceModel;
        if($store->create($data)){
            return true;
        }else{
            return false;
        };
        
    }

    public function getHistory()
    {
        $dataOrder = $this->getOrder();
        $dataSort = array();
        
        foreach($dataOrder as $data){
            $dataCollect = array(
                'nomor' => $data->mobile_number,
                'price' => $data->value,
                'name'  => "Adding Balance",
                'status'=> $data->status
            );
            array_push($dataSort, $dataCollect);
        }
        
        // dd($dataSort);
        return $dataSort;
    }

    public function getOrder()
    {
        $userData = Auth::user();

        $order = BalanceModel::where('user_id', $userData->id)->get();

        return $order;
    }
}
