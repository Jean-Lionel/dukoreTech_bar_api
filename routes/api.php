<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\CompanyOwnerController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\ProductController;


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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('etablissements', EtablissementsController::class);
    Route::resource('company_owners', CompanyOwnerController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('achats', AchatController::class);
    Route::resource('lots', LotController::class);
    Route::resource('ventes', VenteController::class);
});
