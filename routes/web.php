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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function(){
    return view('vdg.dashboard');
})->middleware('auth');


//Rutas para alumno (CRUD)
Route::resource('/alumno', 'alumnosController');

//Rutas para grupo (CRUD)
Route::resource('/grupo', 'GrupoController');

//Rutas para agregar escuelas
Route::resource('/escuela', 'EscuelasController');
//Ruta para obtener los grados (javascripts)
Route::get('/grado','NivelController@grados');

Route::auth();