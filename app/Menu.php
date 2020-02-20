<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public static function main()
	{
		$i = 1;
		$menu = [];
		$pages = \App\Page::whereIn('position', [1,3])
		// ->where('id', '<>', 1)
		// ->orderby(\DB::raw('FIELD(id, "3")'))
		// ->orderby('menu_order')
		// ->active()
		->get();
		// dd($pages);
		foreach ($pages as $page) {

			$menu[$page->slug] = $page->title;

			$child = $page->child;
			if(count($child) > 0){
				$sub = [];
				foreach ($child as $c) {
					$sub['' . $c->slug] = $c->title;
				}
				$menu[$page->slug] = array('' . $page->slug => $page->title, 'sub' => $sub);
			}
			$i++;
		}
		return $menu;
	}

	public static function dates()
	{
		$dates = Date::where('status', '<>', 3)->orderBy('start', 'desc')->take(5)->get();
		return $dates;
	}

	public static function footer_link()
	{
		return Page::whereIn('position', array(2,3))->get();
	}
}
