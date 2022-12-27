<?php

use App\Http\Controllers\Api\Agama37Controller;
use App\Http\Controllers\api\Detaildata37Controller;
use App\Http\Controllers\api\User37Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::resource('/agama37', Agama37Controller::class);

route::resource('/detaildata37', DetailData37Controller::class);

route::resource('/user37', User37Controller::class);
Route::put('/user37/update/image/{id}', [User37Controller::class, 'editimage'])->name('user37.editimage');
Route::put('/user37/update/password/{id}', [User37Controller::class, 'editpassword'])->name('user37.editpassword');

// detail
route::resource('/detaildata37', Detaildata37Controller::class);
