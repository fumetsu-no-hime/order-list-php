<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';

    protected $fillable = ['response','response_id'];

    public function content()
    {
        //hasOne (關聯，對方的欄位，自己的欄位)
        //hasMany (關聯，對方的欄位，自己的欄位)
        return $this->hasOne(Content::class,'id','response_id');
    }
}
