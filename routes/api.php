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


Route::resource('documentTypes', 'documentTypesController');
Route::resource('departments','departmentsController');
Route::resource('cities','citiesController');
Route::resource('neighborhoods','neighborhoodController');
Route::resource('genders','gendersController');

Route::resource('patients','patientsController');

Route::resource('therapists','therapistsController');

Route::resource('institutions','institutionsController');


Route::resource('physiologicalParameters', 'physiologicalParametersController');

Route::resource('exerciseRoutines', 'exerciseRoutinesController');