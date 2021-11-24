<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\HomeController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('country_request', [HomeController::class, 'map_index'])->name('map_index');

Route::get('get_property_type_details/{id}', [HomeController::class, 'property_type'])->name('property_type');

Route::get('get_property_type_parameter/{country}/{id}', [HomeController::class, 'parameter'])->name('parameter');

