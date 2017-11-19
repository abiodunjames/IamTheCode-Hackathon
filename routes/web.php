<?php

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
    return view('page.home');
});

Route::get('api/incidents','PageController@getDashboard');
Route::post('api/upload/image', 'PostController@uploadImage');

Route::post('api/twilio', 'PostController@getUssD');
Route::get('/submit', function () {
    return view('page.home');
});

Route::get('/places', function () {
    return view('page.places');
});
Route::post('/submit', 'SubmissionController@saveSubmission')->name('submit');

Route::group(['middleware' => ['web']], function () {
  Route::get('/admin', 'PageController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
