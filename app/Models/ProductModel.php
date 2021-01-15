<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','no_order','product','ship_address','price','status'];

    public function findItemByNoOrder($id)
    {
        $data = ProductModel::where('no_order',$id)->first();
        return $data;
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
