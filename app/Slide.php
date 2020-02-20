<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	protected $attributes = [
		'status' => 1,
	];

	public static $_thumbdir = [
		'700x525',
		'400x300',
		'100x80',
		'300x300',
	];

	public function scopeHome($query)
	{
		return $query->where('package_id', 0);
	}
	public function scopeActive($query)
	{
		return $query->where('status', 1);
	}


	public function image($size = '450x300')
	{
		if($this->image){
			$image = public_path('uploads/slide/' . $this->image);
			if (file_exists($image)) {
				return asset('uploads/slide/' . $this->image);
			}else{				
				return 'holder.js/' . $size . '/image not found';
			}
		}else{			
			return 'holder.js/' . $size . '/image not found';
		}
	}
	
}
