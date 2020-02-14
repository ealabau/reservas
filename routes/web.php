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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function () {
   
   // Especialidad
Route::get('/especialidades', 'EspecialidadController@index');
Route::get('/especialidades/create', 'EspecialidadController@create');
Route::get('/especialidades/{especialidad}/edit', 'EspecialidadController@edit');
Route::post('/especialidades', 'EspecialidadController@store');
Route::put('/especialidades/{especialidad}', 'EspecialidadController@update');
Route::delete('/especialidades/{especialidad}', 'EspecialidadController@destroy');

//Doctores
Route::resource('doctors','DoctorController');
//Pacientes
Route::resource('patients','PatientController');


});

Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function () {
Route::get('/schedule', 'ScheduleController@edit');
Route::post('/schedule', 'ScheduleController@store');



});