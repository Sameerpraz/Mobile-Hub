<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milk extends Model
{
    protected $fillable=['name','email','phone','image','subscription_type','quantity','district','address','status'];
    protected $table='milks';
}
