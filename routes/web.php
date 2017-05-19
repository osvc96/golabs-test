<?php
use Illuminate\Support\Facades\DB;
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
	$sessionVal = Session::get('sesVal');
	if ($sessionVal == null || $sessionVal == ''){
		Session::put('sesVal', 0);
	}


	//$value = DB::table('test')->first()->value;
    return view('index');//, ['dbValue' => $value]);
})->name('home');

Route::resource('buttons', 'buttonController');

Route::post('setCookie', array('uses' => 'buttonController@cookiebtn'));

Route::post('setSession', array('uses' => 'buttonController@sesbtn'));

Route::post('setLocal', array('uses' => 'buttonController@lsbtn'));