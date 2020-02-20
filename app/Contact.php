<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $attributes = [
        'status' => 1,
    ];
    protected $fillable=['name','email','message'];
}
