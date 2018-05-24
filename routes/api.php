<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1'],function() {
	Route::group(['prefix'=>'admin'],function() {
		Route::apiResource('/clients', 'ClientController');
		Route::apiResource('/sites', 'SiteController');
		Route::apiResource('/sensors', 'SensorController');
		Route::apiResource('/inputs', 'InputController');
		Route::apiResource('/locations', 'LocationController');
		Route::apiResource('/measurements', 'MeasurementController');
	});

	Route::apiResource('/recordings', 'RecordingController');
});


