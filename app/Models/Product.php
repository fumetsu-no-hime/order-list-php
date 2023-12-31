<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';

    protected $fillable = ['name','img_path','price','status','desc'];

    public function user(){
        return $this->hasMany(User::class, 'product_id','id');
    }
}
