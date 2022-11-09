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
    Route::get('/', function (){ return redirect('/vychitka'); });
    Route::get('/vychitka', [VychitkaController::class, 'showAll'])->name('vychitka');
    Route::get('/nagruzka', [NagruzkaController::class, 'showAll'])->name('nagruzka');
    Route::get('/discip', [SpezController::class, 'showAll'])->name('discip');
    Route::get('vychitka/filter/{mesyac}', [VychitkaController::class, 'filterVychitka']);

    Route::get('/api/vychitka', [VychitkaController::class, 'showAllVychitkaJson']);
    Route::get('/api/vychitka/{KOD}', [VychitkaController::class, 'showVychitkaJson']);
    Route::get('/api/nagruzka', [NagruzkaController::class, 'showAllNagruzkaJson']);
    Route::get('/api/nagruzka/{id}', [NagruzkaController::class, 'showNagruzkaJson']);
    Route::get('/api/discip/{kod}', [SpezController::class, 'showDiscipJson']);
    Route::get('/api/discip/sort/{kod}/{search}', [SpezController::class, 'showDiscipSortJson']);

    Route::get('/api/discip/edit/{kod}', [SpezController::class, 'showDiscipEditJson']);
    Route::get('/api/discip/score/latest', [SpezController::class, 'showDiscipLatestJson']);
    Route::get('/api/spez/score/latest', [SpezController::class, 'showSpezLatestJson']);
    Route::get('/api/vychitka/score/latest', [VychitkaController::class, 'showVychitkaLatestJson']);
    Route::get('/api/nagruzka/score/latest', [NagruzkaController::class, 'showNagruzkaLatestJson']);
    Route::get('/api/spezs', [SpezController::class, 'showSpezsJson']);
    Route::get('/api/spez/{kod}', [SpezController::class, 'showSpezJson']);
    Route::post('/api/update/spez', [SpezController::class, 'updateSpez']);
    Route::post('/api/update/discip', [SpezController::class, 'updateDiscip']);
    Route::post('/api/update/vychitka', [VychitkaController::class, 'updateVychitka']);
    Route::post('/api/update/nagruzka', [NagruzkaController::class, 'updateNagruzka']);
    Route::post('/api/add/discip', [SpezController::class, 'addDiscip']);
    Route::post('/api/add/spez', [SpezController::class, 'addSpez']);
    Route::post('/api/add/vychitka', [VychitkaController::class, 'addVychitka']);
    Route::post('/api/add/nagruzka', [NagruzkaController::class, 'addNagruzka']);
    Route::get('/api/spez/delete/{kod}', [SpezController::class, 'deleteSpez']);
    Route::get('/api/discip/delete/{kod}', [SpezController::class, 'deleteDiscip']);
    Route::get('/api/nagruzka/delete/{id}', [NagruzkaController::class, 'deleteNagruzka']);
    Route::get('/api/vychitka/delete/{KOD}', [VychitkaController::class, 'deleteVychitka']);
});



