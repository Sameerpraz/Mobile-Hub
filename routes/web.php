<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['as'=>'index','uses'=>'HomeController@index']);

// routes for admins

Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('admin/logout', 'Admin\LoginController@logout');

Route::get('password/change', 'Admin\DashboardController@passwordchange')->name('password.change');
Route::post('password/change', 'Admin\DashboardController@passwordstore');

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function() {
    Route::any('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/phpinfo', 'DashboardController@phpinfo');
    Route::resource('pages', 'PageController');
    Route::get('pages/photodelete/{page}', 'PageController@photodelete')->name('pages.photodelete');
    Route::get('pages/showhide/{page}', 'PageController@showhide')->name('pages.showhide');
    Route::resource('labels', 'LabelController');
    Route::resource('slides', 'SlideController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('videos', 'VideoController');
    Route::resource('reviews', 'ReviewController');
    Route::get('reviews/approve/{review}', 'ReviewController@approve')->name('reviews.approve');
    Route::get('reviews/cancel/{review}', 'ReviewController@cancel')->name('reviews.cancel');
    Route::resource('milks','MilkController');
    Route::post('milks/{id}/approve', 'MilkController@approve')->name('milk.approve');
    Route::post('milks/{id}/decline', 'MilkController@decline')->name('milk.decline');
    Route::resource('settings', 'SettingController');
    Route::post('logo', 'SettingController@logoChange')->name('change.logo');
    Route::post('headerbg', 'SettingController@headerbgChange')->name('change.headerbg');
    Route::post('parallaxbg', 'SettingController@parallaxbgChange')->name('change.parallaxbg');

    Route::get('milksubscriptions/pdf/{milk}', 'MilkController@pdf')->name('pdf');

    Route::resource('contacts', 'ContactController');
    Route::resource('socials', 'SocialController');

    Route::resource('categories', 'CategoryController');
    Route::post('categories/order', 'CategoryController@order')->name('categories.order');
    Route::resource('items', 'ItemController');
    Route::post('items/order', 'ItemController@order')->name('items.order');
    Route::resource('orders', 'OrderController');
    Route::post('order/{id}/approve', 'OrderController@approve')->name('order.application.approve');
    Route::post('order/{id}/decline', 'OrderController@decline')->name('order.application.decline');
    Route::any('order/monthlyreport', 'OrderController@monthlyreport')->name('monthlyreport.generate');
});


$router = app()->make('router');
//
$pages = App\Page::all();
foreach ($pages as $page) {
    if($page->slug == 'gallery')
    {
        $router->get($page->slug, 'PageController@galleries');
    }
    elseif($page->slug == 'review')
    {
        $router->get($page->slug,'PageController@reviews')->name('review');
        $router->post($page->slug,'PageController@reviewstore');
    }
    elseif($page->slug == 'register')
    {
        $router->get($page->slug, 'PageController@register');

    }
//    elseif($page->slug == 'milk-subscription')
//    {
//        $router->get($page->slug,'PageController@milksubs')->name('milksubs');
//        $router->post($page->slug,'PageController@milksubs');
//    }
    elseif($page->slug == 'contact')
    {
        $router->get($page->slug,'PageController@contact')->name('contact');
        $router->post($page->slug,'PageController@contact');
    }
    elseif($page->slug == 'product')
    {
        $router->get($page->slug,'OrderController@index')->name('order');
    }
    elseif($page->slug != '/')
    {
        $router->get($page->slug,'PageController@index');
    }


}
Auth::routes();

Route::get('captcha.jpg', 'CaptchaController@image')->name('captcha');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('thankyou', 'PageController@thankyou')->name('thankyou');
Route::get('card/{id}','PageController@card')->name('card');

Route::get('thankyoucontact', 'PageController@thankyoucontact')->name('thankyoucontact');

//Product
Route::get('category/{category}','OrderController@category');
Route::get('item/{item}','OrderController@item')->name('item.display');
Route::post('addtocart','OrderController@addtocart')->name('addtocart');
Route::post('removecart','OrderController@removecart')->name('removecart');
Route::post('cartupdate','OrderController@cartupdate')->name('cartupdate');
Route::post('cartload','OrderController@cartload')->name('cartload');
Route::post('topcartload','OrderController@topcartload')->name('topcartload');
Route::post('sidecartload','OrderController@sidecartload')->name('sidecartload');
Route::post('mobilecartload','OrderController@mobilecartload')->name('mobilecartload');

Route::get('orderdetails','OrderController@orderdetails')->name('orderdetails');

Route::post('placeorder','OrderController@placeorder')->name('placeorder');
Route::post('orderdetails','OrderController@orderstore');

Route::get('checkout','CheckoutController@index')->name('checkout');
Route::post('checkout','CheckoutController@checkout');
Route::get('checkout/complete','CheckoutController@complete')->name('complete');
Route::get('bestsellers','HomeController@bestseller')->name('view.bestseller'); 
Route::get('newarrivals','HomeController@newarrival')->name('view.newarrival');


Route::group(['middleware' => ['auth']], function(){
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('changepassword', 'UserController@changepassword')->name('changepassword');
});