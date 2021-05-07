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

Route::get('/', "DataController@index")->name("home");
Route::get('/kegiatan/{id}', "DataController@kegiatanIndex")->name("kegiatanIndex");
Route::get('/search-data/{value}', "DataController@index")->name("searchData");
Route::post('/login', "DataController@authenticate")->name("login");
Route::get('/login', "DataController@vLogin")->name("login.view");
Route::post('/logout', "DataController@logout")->name("logout");
Route::any("donwload/file/kerjasama/{id}", "DataController@donwloadKerjasama")->name("download.file.kerjasama");
Route::middleware(['auth'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', "DataController@dashboard")->name("dashboard");
        Route::any('/search/{id}/{kondisi}', "DataController@dashboard")->name("dashSearch");
        Route::any('/{kondisi}/{id}', "DataController@data")->name("insert.data.action.id");
    });
    Route::any('/update-akun', "DataController@upAkun")->name("upAkun");
    Route::any('/search-level/{id}', "DataController@search_level")->name("search_level");
    Route::any('/keputusan/{id}', "DataController@keputusanKerjasama")->name("keputusan.kerjasama");
    Route::prefix('/insert-data')->group(function () {
        Route::any('/', "DataController@data")->name("insert.data");
        Route::any('/{kondisi}', "DataController@data")->name("insert.data.action");
        Route::any('/{kondisi}/{id}', "DataController@data")->name("insert.data.action.id");
    });
    Route::prefix('/insert-kegiatan')->group(function () {
        Route::any('/', "DataController@kegiatan")->name("insert.kegiatan");
        Route::any('/{kondisi}', "DataController@kegiatan")->name("insert.kegiatan.action");
        Route::any('/{kondisi}/{id}', "DataController@kegiatan")->name("insert.kegiatan.action.id");
    });  
    Route::prefix('/slide-show')->group(function () {
        Route::any('/', "AdminController@slideShow")->name("insert.slide.show");
        Route::any('/{kondisi}', "AdminController@slideShow")->name("insert.slide.show.action");
        Route::any('/{kondisi}/{id}', "AdminController@slideShow")->name("insert.slide.show.action.id");
    });  
    Route::prefix('/akun-baru')->group(function () {
        Route::any('/', "AdminController@dataUser")->name("insert.akun.baru");
        Route::any('/{kondisi}', "AdminController@dataUser")->name("insert.akun.baru.action");
        Route::any('/{kondisi}/{id}', "AdminController@dataUser")->name("insert.akun.baru.action.id");
    });  
});




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
