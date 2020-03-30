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

/*
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/



Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



Route::get('/', 'publicController@homeview')->name('/');

Route::get('nosotros', 'publicController@nosotrosview')->name('nosotros');
Route::get('workschool', 'publicController@workschoolview')->name('workschool');
Route::get('contact', 'publicController@contactview')->name('contact');
Route::get('termsAndConditions', 'publicController@termsAndConditionsview')->name('termsAndConditions');
Route::get('faq', 'publicController@faqview')->name('faq');


Route::get('search', 'SearchController@search')->name('search') ;
Route::get('school/{slug}', 'publicController@schoolShow')->name('school.detail');


Route::group(['prefix' => 'user', 'namespace' => 'User','middleware' => 'auth'], function () {

/**
 * Profile
 */
Route::get('profile', 'UserController@index')->name('profile');
Route::put('profile/{id}', 'UserController@update')->name('profile.update');
Route::delete('profile/delete', 'UserController@destroy')->name('profile.delete');


Route::get('dashboard', function () { return view('user.dashboard'); })->name('dashboard');
Route::get('booking', function () { return view('user.booking'); })->name('booking');


Route::get('bookmarks', function () { return view('user.bookmarks'); })->name('bookmarks');

Route::get('createSchool', 'Escuelas\EscuelasController@index')->name('createSchool');
Route::post('createSchool', 'Escuelas\EscuelasController@store')->name('createschool.store');
Route::post('dropzone/store', 'Escuelas\EscuelasController@dropzoneStore')->name('dropzone.store');


/**
 * Profile
 */

Route::post('addFavoritos', 'Favoritos\FavoritosController@addFavoritos')->name('addFavoritos.create');

/**
 * Profile
 *
 */
Route::get('reviews', 'Comentarios\ComentariosController@viewreviews')->name('reviews');


});
