<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
