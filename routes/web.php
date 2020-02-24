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

Route::get('/', 'BaseController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/layanan/{service}', 'Frontend\ServiceController@show')->name('service.detail');

Route::get('/users', 'Frontend\UsersController@index')->name('user');
Route::get('/users/login', 'Frontend\UsersController@login')->name('user.login');
Route::post('users/login', 'Frontend\UsersController@log')->name('user.log');
Route::get('/users/register', 'Frontend\UsersController@register')->name('user.register');
Route::post('/users/register', 'Frontend\UsersController@regist')->name('user.regist');
Route::get('/users/main', 'Frontend\UsersController@main')->name('user.main');

Route::get('/users/{token}/verif-email', 'Frontend\UsersController@verifEmail');

Route::get('/rawat-jalan', 'Frontend\UsersController@rawatjalan')->name('rawat.jalan');
Route::post('/rawat-jalan', 'Frontend\UsersController@daftarRj')->name('daftar.rawat.jalan');
Route::get('/rawat-jalan/code', 'Frontend\UsersController@code')->name('list.rawat.jalan');
Route::get('/rawat-jalan/code/{id}/detail', 'Frontend\UsersController@codeDetail')->name('code.rawat.jalan');
Route::delete('/rawat-jalan/code/{id}/delete', 'Frontend\UsersController@codeDelete')->name('delete.rawat.jalan');

Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'admin'], function () {
		Route::group(['middleware' => ['role:admin']], function () {
			Route::get('/', 'Admin\MainController@index')->name('admin.index');
			Route::resource('roles', 'Admin\RoleController');
			Route::resource('services', 'Admin\ServiceController');
			Route::resource('doctors', 'Admin\DoctorsController');
			Route::resource('patients', 'Pasien\PasienController');
		});
	}); 
});