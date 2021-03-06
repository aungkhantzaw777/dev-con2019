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

Route::get('/', function () {
    return view('index');
})->name('welcome');
# pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/call-for-proposals', 'pages.call-for-proposals')->name('call-for-proposal');
Route::view('/contact', 'pages.contact');
Route::view('/login', 'pages.login')->name('clientLogin');
Route::view('/previous-years', 'pages.previous-years')->name('previous-years');
Route::view('/register-your-ticket-process', 'pages.register-your-ticket-process')->name('register-your-ticket-process');
Route::view('/register-your-ticket', 'pages.register-your-ticket');
Route::get('/activate-your-ticket/{ticket_id}', 'AuthUserController@activateAccount');

# password
Route::get('/password/forget', 'ForgetPasswordController@forget')->name('password-forget');
Route::post('/password/forget', 'ForgetPasswordController@postForget')->name('post-forget');
Route::get('/password/reset/{auth}', 'ForgetPasswordController@reset')->name('reset');
Route::post('/password/reset', 'ForgetPasswordController@postReset')->name('post-reset');

# pages
Route::view('/speakers', 'pages.speakers');
Route::view('/sponsors', 'pages.sponsors');
Route::view('/schedule', 'pages.schedule');
Route::view('/profile', 'pages.profile')->name('profile');
Route::post('activateAccount','AuthUserController@postActivate')->name('postActivate');
Route::post('register','AuthUserController@postRegister')->name('postRegister');
Route::view('/get-ticket', 'pages.get-ticket');




# payment
Route::get('payment', 'PaymentController@payment')->name('payment');
Route::post('/payment/result', 'PaymentController@paymentResponse')->name('payment-response');

// Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::post('activate','AuthUserController@activate')->name('activate');
Route::get('activateAccount/{ticket_id}','AuthUserController@activateAccount')->name('activateAccount');

Route::get('login','AuthUserController@login')->name('login');
Route::get('logout','AuthUserController@logout')->name('clientLogout');
Route::get('success','AuthUserController@success')->name('success');
Route::post('login','AuthUserController@postLogin')->name('loginPost');


Route::group(['prefix' => 'dev_con'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('login', 'AdminController@login');
    Route::post('login', 'AdminController@postLogin');
    Route::get('logout', 'AdminController@logout');
    Route::post('searchuser', 'AdminController@search');
});
