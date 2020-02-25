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
<<<<<<< HEAD
			Route::resource('patients', 'Pasien\PasienController');
=======
			Route::resource('operators', 'Admin\OperatorController');
>>>>>>> 7489907f49fb514061ba2877c6b22b203e3304c4
		});
	}); 
});

Route::group(['prefix' => 'operator'], function () {
	Route::get('/', 'Operator\MainController@index')->name('operator.index');
	Route::get('/login', 'Operator\LoginController@login')->name('operators.login');
	Route::post('/login', 'Operator\LoginController@log')->name('operators.log');
	Route::group(['middleware' => ['role:operator']], function () {
		Route::get('/pendaftaran', 'Operator\MainController@regist')->name('operator.regist');
		Route::get('/pendaftaran/{number}/next', 'Operator\MainController@registDetail')->name('operator.next');
		Route::post('/pendaftaran', 'Operator\MainController@assignWL')->name('operator.assign');
	});
});

Route::group(['prefix' => 'dokter'], function () {
	Route::get('/', 'Dokter\MainController@index')->name('dokter.index');
	Route::get('/login', 'Dokter\LoginController@login')->name('dokter.login');
	Route::post('/login', 'Dokter\LoginController@log')->name('dokter.log');
	Route::group(['middleware' => ['role:dokter']], function () {
		Route::get('/check/{id}', 'Dokter\MainController@check')->name('dokter.check');
		Route::post('/checked', 'Dokter\MainController@checked')->name('dokter.checked');
	});
});