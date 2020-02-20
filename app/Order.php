<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $attributes = [
        'status' => 0,
    ];

    protected $ord_status = [
        0 => 'Pending',
        1 => 'Process',
        3 => 'Finish',
    ];

    public function items()
    {
        return $this->hasMany('\App\Orderitem');
    }

    public function scopeToday($query)
    {
        return $query->where('collection_date_time', '>=', date('Y-m-d'));
    }

    public function scopePending($query)
    {
        return $query->where('status', 0);
    }

    public function scopeNotPending($query)
    {
        return $query->where('status', '<>', 0);
    }


    public function getTotalAttribute()
    {
        return number_format($this->items()->sum('total'), 2);
    }

    public function getTypeAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->order_type));
    }

    public function getPaymentAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->payment_method));
    }
    public function getDateTimeAttribute()
    {
        return date('d M, Y h:i A', strtotime($this->collection_date_time));
    }
    public function getDateAttribute()
    {
        return date('d M, Y', strtotime($this->collection_date_time));
    }
    public function getTimeAttribute()
    {
        return date('h:i A', strtotime($this->collection_date_time));
    }
    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function getOrderStatusAttribute()
    {
        return $this->ord_status[$this->status];
    }

}
