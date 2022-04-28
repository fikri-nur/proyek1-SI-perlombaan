<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataLombaController;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\HomeController;
use App\http\Controllers\AdminController;
use App\http\Controllers\PenyelenggaraController;
use App\http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\http\Controllers\AboutControllers;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/detail-lomba/{id}', [DataLombaController::class, 'detailLomba']);

Route::get('/lomba', [DataLombaController::class, 'getDataLomba']);

Route::resource('abou',AboutControllers::class);


//Route Admin
Route::group(['middleware' => 'admin'], function () {
    //Index 
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
    
    //Admin
    //Get Admin
    Route::get('/admin/dashboard/admin', [AdminController::class, 'getAdmin']);
    //Edit Admin Jadikan User
    Route::get('/admin/dashboard/admin/jadikan-user/{id}', [AdminController::class, 'editAdmin']);
    Route::get('/admin/dashboard/admin/jadikan-user/proses/{id}', [AdminController::class, 'prosesAdmin']);

    //Penyelenggara
    //Get Penyelenggara
    Route::get('/admin/dashboard/penyelenggara', [AdminController::class, 'getPenyelenggara']);
    //Edit Penyelenggara Jadikan User
    Route::get('/admin/dashboard/penyelenggara/jadikan-user/{id}', [AdminController::class, 'editPenyelenggara']);
    Route::get('/admin/dashboard/penyelenggara/jadikan-user/proses/{id}', [AdminController::class, 'prosesPenyelenggara']);

    //User
    //Get User
    Route::get('/admin/dashboard/user', [AdminController::class, 'getUser']);
    //Edit User Jadikan Admin
    Route::get('/admin/dashboard/user/jadikan-admin/{id}', [AdminController::class, 'editUser']);
    Route::get('/admin/dashboard/user/jadikan-admin/proses/{id}', [AdminController::class, 'prosesUser']);
    //Edit User Jadikan Penyelenggara
    Route::get('/admin/dashboard/user/jadikan-penyelenggara/{id}', [AdminController::class, 'addPenyelenggara']);
    Route::get('/admin/dashboard/user/jadikan-penyelenggara/proses/{id}', [AdminController::class, 'prosesAdd']);

    //Lomba
    //Get Lomba
    Route::get('/admin/dashboard/data-lomba', [AdminController::class, 'getLombaAdmin']);
    //Delete Bandara
    Route::get('/admin/dashboard/data-lomba/delete/{id}', [AdminController::class, 'deleteLomba']);
    Route::get('/admin/dashboard/data-lomba/delete/proses/{id}', [AdminController::class, 'deleteLombaProses']);
});

//Route Penyelenggara
Route::group(['middleware' => 'penyelenggara'], function () {
    //Index 
    Route::get('/penyelenggara/dashboard', [PenyelenggaraController::class, 'penyelenggaraDashboard']);

    //Lomba
    //Get Lomba
    Route::get('/penyelenggara/dashboard/data-lomba/{id}', [PenyelenggaraController::class, 'getLombaPenyelenggara']);
    //Tambah Lomba
    Route::get('/penyelenggara/dashboard/data-lomba/{id}/tambah-data', [PenyelenggaraController::class, 'tambahData']);
    Route::post('/penyelenggara/dashboard/data-lomba/{id}/tambah-data/proses', [PenyelenggaraController::class, 'tambahDataProses']);
    //Update Lomba
    Route::get('/penyelenggara/dashboard/data-lomba/update/{id}', [PenyelenggaraController::class, 'update']);
    Route::post('/penyelenggara/dashboard/data-lomba/update/proses/{id}', [PenyelenggaraController::class, 'prosesUpdate']);
    //Delete Lomba
    Route::get('/penyelenggara/dashboard/data-lomba/delete/{id}', [PenyelenggaraController::class, 'deleteLombaPenyelenggara']);
    Route::get('/penyelenggara/dashboard/data-lomba/delete/proses/{id}', [PenyelenggaraController::class, 'deleteLombaProsesPenyelenggara']);
});