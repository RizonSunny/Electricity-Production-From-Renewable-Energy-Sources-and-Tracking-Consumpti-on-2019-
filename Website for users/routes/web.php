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
Route::get('testrun',function(){
  return view('graph');
});

Route::get('testrun2',function(){
  return view('050719');
});
/// main web
Route::get('home',function(){
  return view('homepage');
});

Route::get('consumption_data','FirebaseController@consumption_data');
Route::get('flat1','FirebaseController@flat1');
Route::get('flat2','FirebaseController@flat2');
Route::get('flat3','FirebaseController@flat3');

Route::get('production_state','FirebaseController@production_state');


Route::get('temp','FirebaseController@Add_data');






Route::get('firebase','FirebaseController@index');
Route::get('40percent',function(){
  return view('ash_home');
});


Route::post('ADD','Firebasecontroller@Add_data');
Route::get('SEE','FirebaseController@See_data');

Route::get('SolarData','FirebaseController@Solar_data_see');
