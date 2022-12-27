<?php

use App\Http\Controllers\Agama37Controller;
use App\Http\Controllers\Auth37Controller;
use App\Http\Controllers\User37Controller;
use App\Http\Controllers\Detaildata37Controller;
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

Route::get('/', function () {
    return view('welcome', [
        'page' => "Home"
    ]);
})->middleware('auth');


// auth
Route::get('/login37', [Auth37Controller::class, 'login'])->name('login');
Route::get('/register37', [Auth37Controller::class, 'register'])->name('auth37.register');
Route::get('/logout37', [Auth37Controller::class, 'logout'])->name('auth37.logout');

Route::post('/login37', [Auth37Controller::class, 'loginP'])->name('auth37.loginP');
Route::post('/register37', [Auth37Controller::class, 'registerP'])->name('auth37.registerP');

Route::middleware('auth')->group(function () {
    
    Route::resource('/agama37', Agama37Controller::class)->middleware('admin');

    Route::get('/profile37', [User37Controller::class, 'profile'])->name('user37.profile');
    Route::put('/profile37/edit/image/{id}', [User37Controller::class, 'editimage'])->name('user37.editimage');
    Route::put('/profile37/edit/password/{id}', [User37Controller::class, 'editpassword'])->name('user37.editpassword');

   
    Route::resource('/user37', User37Controller::class)->middleware('admin');

    Route::resource('/detaildata37', Detaildata37Controller::class);
});