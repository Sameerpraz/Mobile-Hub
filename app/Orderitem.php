<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    public function getFPriceAttribute()
    {
        return number_format($this->price,2);
    }
    public function getFTotalAttribute()
    {
        return number_format($this->total,2);
    }
}
