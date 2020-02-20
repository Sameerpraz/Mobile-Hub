<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
	public function scopeOfValue($query, $labelid)
	{
		$label = $query->where('labelid', $labelid)->first();
		return $label ? ($label->value ? $label->value : '&nbsp;') : $labelid;		
	}
}
