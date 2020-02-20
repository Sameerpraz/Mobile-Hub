<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table='gallaries';
	protected $attributes = [
		'status' => 1,
	];

	public function image($size = '400x300')
	{
		if($this->image && file_exists(public_path('uploads/gallery/' . $this->image))){
			return url('uploads/gallery/' . $size . '/' . $this->image);
		}else{
			return asset('images/default/' . $size .'.jpg');
		}
	}
}
