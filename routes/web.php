<?php

use App\Http\Controllers\SpezController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrepodController;
use App\Http\Controllers\NagruzkaController;
use App\Http\Controllers\VychitkaController;
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

Route::get('/home', function () {
    return \Illuminate\Support\Facades\Redirect::to('/');
});


Route::get('/prepods/get', [PrepodController::class, 'showAll']);
Route::post('/prepods/login', [PrepodController::class, 'login']);
Route::post('/prepods/register', [PrepodController::class, 'register']);

Route::middleware('auth')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/vychitka', [VychitkaController::class, 'showAll'])->name('vychitka');
    Route::get('/nagruzka', [NagruzkaController::class, 'showAll'])->name('nagruzka');
    Route::get('/discip', [SpezController::class, 'showAll'])->name('discip');

    Route::get('/api/vychitka', [VychitkaController::class, 'showVychitkaJson']);
    Route::get('/api/nagruzka', [NagruzkaController::class, 'showNagruzkaJson']);
    Route::get('/api/discip/{kod}', [SpezController::class, 'showDiscipJson']);
    Route::get('/api/spezs', [SpezController::class, 'showSpezsJson']);
    Route::get('/api/spez/{kod}', [SpezController::class, 'showSpezJson']);
});



