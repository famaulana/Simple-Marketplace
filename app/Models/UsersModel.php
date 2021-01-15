<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    // use HasFactory;
    protected $table = 'Users';
    protected $fillable = ['name','email','password','mobile_number','balance'];

    public function store($data)
    {
        $store = new UsersModel;
        if($store->create($data)){
            return true;
        }else{
            return false;
        };
        
    }
}
