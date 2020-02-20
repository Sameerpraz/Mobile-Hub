<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function scopeOfValue($query, $title)
    {
        $setting = $query->where('title', $title)->first();
        return $setting ? ($setting->value ? $setting->value : '&nbsp;') : $title;
    }

    public static function getLogo($default = 'images/logo.png')
    {
        $setting = Setting::whereTitle('logo')->first();
        if ($setting) {
            return asset('uploads/logo/' . $setting->value);
        } else {
            return asset($default);
        }
    }
    public static function getBg($default = 'image/header_bg.jpg')
    {
        $setting = Setting::whereTitle('header_bg')->first();
        if ($setting) {
            return asset('uploads/headerbg/' . $setting->value);
        } else {
            return asset($default);
        }
    }
    public static function getParallax($default = 'image/parallax_bg.jpg')
    {
        $setting = Setting::whereTitle('parallax_bg')->first();
        if ($setting) {
            return asset('uploads/parallaxbg/' . $setting->value);
        } else {
            return asset($default);
        }
    }
}
