<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'del_infos';

    protected $fillable = ['user_id','name','address','date','phone','memo','number','payment','subtotal'];

    public function orderProduct(){
        return $this->hasMany(OrderProduct::class,'id', 'user_id');
    }
}
