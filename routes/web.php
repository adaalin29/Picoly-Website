<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@index' );
Route::get('tarife', 'IndexController@tarife' );
Route::get('contact', 'ContactController@contact');
Route::get('reseller', 'IndexController@reseller' );
Route::get('afiliati', 'AffiliateController@afiliati' );
Route::get('faq', 'IndexController@faq' );

Route::get('articole', 'ArticoleController@index' );
Route::get('articol/{url_slug}', 'ArticoleController@articol' );

Route::get('proiecte', 'IndexController@proiecte' );
Route::get('assets', 'IndexController@assets' );
Route::get('functioneaza', 'IndexController@functioneaza' );
Route::get('termeni', 'IndexController@termeni' );
Route::get('gdpr', 'IndexController@gdpr' );
Route::get('cookie', 'IndexController@cookie' );
Route::get('prelucrare', 'IndexController@prelucrare' );
Route::get('formular-comanda-picoly', 'IndexController@formularComanda' );

Route::post('send-message','ContactController@send_message');
Route::post('send-affiliate','AffiliateController@send_affiliate');

Route::get('locale/{locale}', function($locale) {
  Session::put('locale', $locale);
  return redirect()->back();
});


Route::post('checkout','PaymentController@checkout');
Route::get('plata-succes','PaymentController@successPayment');
Route::get('plata-refuzata','PaymentController@declinedPayment');

Route::get('generate-user','PaymentController@generateUser');

Route::get('/storage/thumb/{query}/{file?}', 'ThumbController@index')->where(['query' => '[A-Za-z0-9\:\;\-]+', 'file'  => '.*'])->name('thumb');
