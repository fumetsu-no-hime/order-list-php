<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'del_infos';

    protected $fillable = ['user_id','name','address','date','phone','memo','number','payment','subtotal','status'];

    //status
    //1 => 未繳費
    //2 => 已繳費
    //3 => 已出貨
    //4 => 完成訂單
    //5 => 取消訂單

    public function orderProduct(){
        return $this->hasMany(OrderProduct::class,'form_id', 'id');
    }
}
