<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = ['content'];

    public function response()
    {
        //hasOne (關聯，對方的欄位，自己的欄位)
        //hasMany (關聯，對方的欄位，自己的欄位)
        return $this->hasMany(Response::class,'response_id','id');
    }
}
