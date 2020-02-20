<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $table='pages';

	protected $attributes = [
		'status' => 1,
	];

	public function parent()
	{
		return $this->belongsTo('App\Page', 'parent_id');
	}

	public function child()
	{
		return $this->hasMany('App\Page', 'parent_id');
	}

	public function meta_title()
	{
		return $this->meta_title ? $this->meta_title : $this->title . ' - ' . config('app.name');
	}

	public function meta_description()
	{
		return $this->meta_description ? $this->meta_description : $this->title;
	}

	public function meta_keyword()
	{
		return $this->meta_keyword ? $this->meta_keyword : $this->title;
	}

	static function endsWith( $str, $sub = '?' ) {
		return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
	}
}
