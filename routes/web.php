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

    Route::get('/',function (){
        return redirect('awal');
    }); 

    // jadwal
    Route::resource('jadwal','jadwalController');
    // filter
    Route::post('cari/','jadwalController@cari');
    Route::post('cari2/','jadwalController@cari2');
    Route::post('cari3/','jadwalController@cari3');
    // data sekolah
    Route::resource('sekolah','sekolahController');
    // awal
    Route::resource('awal','awalController',[
        'only' =>['index']
    ]);
    


        
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

