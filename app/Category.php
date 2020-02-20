<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $attributes = [
        'status' => 1,
        'parent_id' => 0,
    ];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function child()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item')->orderby('order_by');
    }

    public function getParentTitleAttribute()
    {
        return $this->parent ? $this->parent->title : 'None';
    }

    public function getUrlAttribute()
    {
        return url('category/'.$this->slug);
    }
}
