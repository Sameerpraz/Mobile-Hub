<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=['user_id','name','email','image'];
    protected $table='admins';
}
