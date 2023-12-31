<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_infos';

    protected $fillable = ['img_path','product_name','desc','qty','price','form_id'];

    public function order(){
        return $this->belongsTo(Order::class, 'form_id','id');
    }
}
