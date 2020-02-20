<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $attributes = [
	'status' => 0,
	];
	public static $_thumbdir = [
		'700x525',
		'400x300',
		'100x80',
		'300x300',
	];
	protected $file_path = 'review';

	public function country()
	{
		return $this->belongsTo('\App\Country');
	}
	public function scopeActive($query)
	{
		return $query->where('status', 1);
	}

	public function image($size = '300x300')
	{
		if($this->image){
			$image = public_path('uploads/reviews/' . $this->image);
			if (file_exists($image)) {
				return url('uploads/reviews/' . $this->image);
			}else{
				return 'holder.js/' . $size . '/image not found';
			}
		}else{
			return 'holder.js/' . $size . '/image not found';
		}
	}

}
