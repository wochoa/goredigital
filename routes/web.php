<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('storage/avatar/{file}', function ($file) {

	$rutaDeArchivo = storage_path() . '/app/avatar/' . $file;
	//return $rutaDeArchivo;
	return response()->file($rutaDeArchivo);
});

Route::get('/', 'HomeController@index')->name('main');
Route::get('/ticket', 'HomeController@ticket')->name('ticket');

Route::get('/oficina', 'HomeController@oficina')->name('oficina');
Route::get('/configcuenta', 'HomeController@configcuenta')->name('configcuenta');

Route::get('/chat', 'HomeController@chat')->name('chat');
Route::get('/misticket', 'HomeController@misticket')->name('misticket');

Route::get('/usuariossgd', 'HomeController@usuariossgd')->name('usuariossgd');
Route::get('/catatencion', 'HomeController@catatencion')->name('catatencion');
route::get('/usersoporte','HomeController@usersoporte')->name('usersoporte');

route::get('/rolpermiso','HomeController@rolpermiso')->name('rolpermiso');
route::get('/permisos','HomeController@permisos')->name('permisos');
route::get('/reporteetnciones','HomeController@reporteetnciones')->name('reporteetnciones');
