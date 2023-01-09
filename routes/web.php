<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login83Controller;
use App\Http\Controllers\Admin83Controller;
use App\Http\Controllers\Agama83Controller;
use App\Http\Controllers\User83Controller;

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

//Login
Route::get('/login83', [Login83Controller::class, 'login83'])->name('login');
Route::get('/registrasi83', [Login83Controller::class, 'registrasi83']);
Route::post('/prosesRegistrasi83', [Login83Controller::class, 'prosesregistrasi83']);
Route::post('/prosesLogin83', [Login83Controller::class, 'proseslogin83']);
Route::get('/logout', [Login83Controller::class, 'logout']);

Route::middleware('auth')->group(function () {
    //Admin
    Route::get('/', [Admin83Controller::class, 'indexAdmin83']);
    Route::get('/verifikasiUser83', [Admin83Controller::class, 'approve83']);
    Route::post('/prosesApprove/{id}', [Admin83Controller::class, 'prosesApprove83']);
    Route::get('/detailUser83/{id}', [Admin83Controller::class, 'detailUser83']);
    
    //Agama
    Route::get('/agama83', [Agama83Controller::class, 'index83']);
    Route::get('/tambahAgama83', [Agama83Controller::class, 'create83']);
    Route::post('/prosesTambahAgama83', [Agama83Controller::class, 'store83']);
    Route::get('/detailAgama83/{id}', [Agama83Controller::class, 'show83']);
    Route::get('/editAgama83/{id}', [Agama83Controller::class, 'edit83']);
    Route::post('/prosesEditAgama83/{id}', [Agama83Controller::class, 'update83']);
    Route::post('/hapusAgama83/{id}', [Agama83Controller::class, 'destroy83']);
    
    //User
    Route::get('/profile83', [User83Controller::class, 'index83']);
    Route::get('/settingProfile83', [User83Controller::class, 'add83']);
    Route::post('/prosesSettingProfile83', [User83Controller::class, 'store83']);
    Route::get('/editProfile83', [User83Controller::class, 'edit83']);
    Route::post('/prosesEditProfile83', [User83Controller::class, 'update83']);
    Route::get('/updateFotoProfil83', [User83Controller::class, 'editFoto83']);
    Route::post('/prosesUpdateFotoProfile83', [User83Controller::class, 'storeFoto83']);
    Route::post('/deleteFotoProfile83', [User83Controller::class, 'destroyFoto83']);
    Route::get('/gantiPassword83', [User83Controller::class, 'editPassword83']);
    Route::post('/prosesGantiPassword83', [User83Controller::class, 'updatePassword83']);
});
