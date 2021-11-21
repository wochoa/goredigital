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
Route::get('/register', function () {
    return redirect('/');
});

Route::get('/password/reset', function () {
    return redirect('/');
});

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

//gestion portales
route::get('/gestionportales','HomeController@gestionportales')->name('gestionportales');

// rutas para servicios pide
// consulta pide
route::get('/pide','pide@pide')->name('pide');

route::get('/reniec/{dni}','pide@reniec')->name('reniec');
route::get('/sis/{dni}','pide@sis')->name('sis');
route::get('/sunat/{ruc}','pide@sunat')->name('sunat');
route::get('/sunedu/{dni}','pide@sunedu')->name('sunedu');
route::get('/essalud/{dni}','pide@essalud')->name('essalud');
route::get('/proveedorsancionado/{ruc}','pide@proveedorsancionado')->name('proveedorsancionado');
route::get('/busprocselxexpediente/{exp}','pide@busprocselxexpediente')->name('busprocselxexpediente');
route::get('/busprocselxrucaniomes/{ruc}/{anio}/{mes}','pide@busprocselxrucaniomes')->name('busprocselxrucaniomes');
route::get('/infocolnacioparticular/{id}','pide@infocolnacioparticular')->name('infocolnacioparticular');
route::get('/gradoinstituto/{dni}','pide@gradoinstituto')->name('gradoinstituto');
route::get('/antecedentejudicial/{pat}/{mat}/{nom}','pide@antecedentejudicial')->name('antecedentejudicial'); 
route::get('/proveedoradjudicadoxexpediente/{exp}','pide@proveedoradjudicadoxexpediente')->name('proveedoradjudicadoxexpediente');
route::get('/proveeadjxrucyanio/{ruc}/{anio}','pide@proveeadjxrucyanio')->name('proveeadjxrucyanio');
route::get('/conadis/{dni}','pide@conadis')->name('conadis');//
route::get('/juntos/{dni}','pide@juntos')->name('juntos');
route::get('/pension/{dni}','pide@pension')->name('pension');
route::get('/qaliwarma','pide@qaliwarma')->name('qaliwarma');
route::get('/toke_qaliwarma','pide@toke_qaliwarma')->name('toke_qaliwarma');
