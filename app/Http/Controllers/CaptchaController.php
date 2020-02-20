<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function image()
    {
    	$pass = $this->generate_string();    	
    	session()->put('rand_pass', $pass);

    	$width = (int) config('captcha.width');
    	$height = (int) config('captcha.height');

		$img = \Image::canvas($width, $height, '#0062cc');
		$img->text($pass, $width/2, $height/2, function($font) {
			$font->file(public_path('font/gothambook.ttf'));
		    $font->size(16);
		    $font->color('#000');
		    $font->align('center');
		    $font->valign('center');
		    $font->angle(0);
		});
		return $img->response('jpg');
    }



    protected function generate_string()
	{
		$chars = config('captcha.chars');
		$number_of_char = config('captcha.number_of_char');

		$chars_length = strlen($chars);

	    $random_string = '';

	    for($i = 0; $i < $number_of_char; $i++) {

	        $random_string .= $chars[mt_rand(0, $chars_length - 1)];

	    }
	  
	    return $random_string;
	}
}
