<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	protected $attributes = [
	'status' => 1,
	];	

	public function thumb($size = '300x300')
	{
		if($this->image){
			$image = public_path('uploads/socials/' . $this->image);
			if (file_exists($image)) {
				return url('upload/socials/' . $size . '/' . $this->image);
			}else{				
				return 'holder.js/' . $size . '/image not found';
			}
		}else{			
			return 'holder.js/' . $size . '/image not found';
		}
	}
}
