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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', 'Controller@home');

Route::get('/dataperkec','Controller@perkec');
Route::get('/dataperpus','Controller@perpus');

Route::get('/mapkec', function () { return view('mapkec'); });
Route::get('/kec', 'Controller@kec');
// Route::get('/mapkec', 'Controller@kec');
Route::get('/mappus', 'Controller@pus');


Route::get('/login', 'Controller@login');
Route::post('/regis', 'Controller@register');
Route::get('/actlog', 'Controller@actlog');



Route::get('/admin', 'CoAdmin@home');
// Route::post('/edpeng:admin={id}', 'CoAdmin@edpeng');

Route::get('/datapengguna', 'CoAdmin@dtapeng');
Route::get('/kec/{id}','CoAdmin@kecAjax');
Route::post('/add_pengguna', 'CoAdmin@addpeng');
Route::get('/pengguna:ed={id}', 'CoAdmin@edpeng');
Route::post('/pengguna:upd={id}', 'CoAdmin@updpeng');
Route::get('/pengguna:del={id}', 'CoAdmin@delpeng');

Route::get('/datakecamatan', 'CoAdmin@dtakec');
Route::get('/createkec', 'CoAdmin@crekec');
Route::post('/add_kecamatan', 'CoAdmin@addkec');
Route::get('/kecamatan:ed={id}', 'CoAdmin@edkec');
Route::post('/kecamatan:upd={id}', 'CoAdmin@updkec');
Route::get('/kecamatan:del={id}', 'CoAdmin@delkec');

Route::get('/datapuskesmas', 'CoAdmin@dtapus');
Route::post('/add_puskesmas', 'CoAdmin@addpus');
Route::get('/puskesmas:ed={id}', 'CoAdmin@edpus');
Route::post('/puskesmas:upd={id}', 'CoAdmin@updpus');
Route::get('/puskesmas:del={id}', 'CoAdmin@delpus');


Route::get('/datasuwkec', 'CoAdmin@dtasuwkec');
Route::get('/datasuwpus', 'CoAdmin@dtasuwpus');


Route::get('/operator', 'CoOperator@home');
Route::post('/sesope:upd={id}', 'CoOperator@updpet');

Route::get('/datahastim', 'CoOperator@dtahastim');




Route::get('/petpuskesmas', 'CoPetpus@home');
Route::post('/sespet:upd={id}', 'CoPetpus@updpet');

Route::get('/datastunting', 'CoPetpus@dtastunting');
Route::post('/add_stunting', 'CoPetpus@addstunting');
Route::post('/stunting:upd={id}', 'CoPetpus@updstunting');
Route::get('/stunting:del={id}', 'CoPetpus@delstunting');

Route::get('/dataweight', 'CoPetpus@dtaweight');
Route::post('/add_weight', 'CoPetpus@addweight');
Route::post('/weight:upd={id}', 'CoPetpus@updweight');
Route::get('/weight:del={id}', 'CoPetpus@delweight');

Route::get('/datawasting', 'CoPetpus@dtawasting');
Route::post('/add_wasting', 'CoPetpus@addwasting');
Route::post('/wasting:upd={id}', 'CoPetpus@updwasting');
Route::get('/wasting:del={id}', 'CoPetpus@delwasting');


Route::get('/logout', 'Controller@logout');

