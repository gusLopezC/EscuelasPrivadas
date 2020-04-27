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


Route::get('/auth/redirect/{provider}', 'Auth\SocialController@redirect');
Route::get('/callback/{provider}', 'Auth\SocialController@callback');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'publicController@homeview')->name('/');

Route::get('nosotros', 'publicController@nosotrosview')->name('nosotros');
Route::get('workschool', 'publicController@workschoolview')->name('workschool');
Route::get('contact', 'publicController@contactview')->name('contact');
Route::post('contact', 'publicController@contactsend')->name('contactSend');
Route::get('termsAndConditions', 'publicController@termsAndConditionsview')->name('termsAndConditions');
Route::get('faq', 'publicController@faqview')->name('faq');


Route::get('search', 'SearchController@search')->name('search');
Route::get('school/{slug}', 'publicController@schoolShow')->name('school');
Route::get('school/comentary/{slug}', 'User\Comentarios\ComentariosController@obtenerComentarios')->name('obtenerComentarios');



Route::get('prueba', function () {
    return view('prueba');
})->name('prueba');

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function () {

    /**
     * Profile
     */
    Route::get('profile', 'UserController@index')->name('profile');
    Route::put('profile/{id}', 'UserController@update')->name('profile.update');
    Route::post('pictureprofile', 'UserController@pictureprofile')->name('pictureprofile');
    Route::delete('profile/delete', 'UserController@destroy')->name('profile.delete');

    /**
     * Create School
     *
     */
    Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

    /**
     * Create School
     *
     */
    Route::get('createSchool', 'Escuelas\EscuelasController@index')->name('createSchool');
    Route::post('createSchool', 'Escuelas\EscuelasController@store')->name('createschool.store');
    Route::get('editSchool/{slug}', 'Escuelas\EscuelasController@edit')->name('school.edit');    //EDITAR
    Route::put('editSchool/{escuela}', 'Escuelas\EscuelasController@update')->name('school.update');     //UPDATE
    Route::put('editSchoolNivel/{EscuelasNivel}', 'Escuelas\EscuelasController@updateNivel')->name('school.Nivel.update');     //UPDATE
    Route::put('editSchoolPrices/{id}', 'Escuelas\EscuelasController@updatePrices')->name('school.prices.update');     //UPDATE
    Route::get('school/{id}/delete', 'Escuelas\EscuelasController@destroy')->name('school.delete');     //DELETE
    Route::get('schoolPrice/{id}/delete', 'Escuelas\EscuelasController@Pricedestroy')->name('school.price.delete');     //DELETE
    Route::delete('schoolphoto/{photo}', 'Escuelas\EscuelasController@destroyPhotos')->name('school.photos.destroy');     //DELETE

    /**
     * Comentario
     *
     */
    Route::post('createComentario', 'Comentarios\ComentariosController@storeComentario')->name('comentario.store');
    Route::get('comentarioUtil/{comentario}', 'Comentarios\ComentariosController@comentarioUtil')->name('comentario.comentarioUtil');

    /**
     * Reviews
     *
     */
    Route::get('reviews', 'Comentarios\ComentariosController@viewreviews')->name('reviews');
    Route::get('editreview/{post}', 'Comentarios\ComentariosController@edit')->name('reviews.edit');
    Route::put('reviews/{comentario}', 'Comentarios\ComentariosController@update')->name('reviews.update');             //UPDATE
    Route::get('reviews/{id}/delete', 'Comentarios\ComentariosController@destroy')->name('reviews.delete');
    Route::delete('reviewsphoto/{post}/delete', 'Comentarios\ComentariosController@destroyPhoto')->name('reviewsreviewsphoto.delete');

    /**
     * Favoritos
     *
     */
    Route::get('addFavoritos/{id}', 'Favoritos\FavoritosController@addFavoritos')->name('addFavoritos');
    Route::get('bookmarks', 'Favoritos\FavoritosController@viewFavoritos')->name('bookmarks');
    Route::delete('deleteFavoritos/{id}', 'Favoritos\FavoritosController@deleteFavoritos')->name('deleteFavoritos');

    /**
     * Reservas
     *
     */
    Route::get('booking/{slug}', 'Bookings\BookingController@index')->name('createBooking');
    Route::post('booking', 'Bookings\BookingController@store')->name('Booking.store');
    Route::get('booking', 'Bookings\BookingController@showbookings')->name('booking');
    Route::get('cancelBooking/{id}', 'Bookings\BookingController@cancelBooking')->name('cancelBooking');

    /**
     * Chat
     *
     */


    Route::get('messages', 'Chat\ChatController@index')->name('messages');
    Route::get('message/{id}', 'Chat\ChatController@getMessage')->name('message');
    Route::post('message', 'Chat\ChatController@sendMessage');



}); //end session



Route::get('lang/{locale}', 'LocalizationController@index')->name('lang');
