<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TareasController;
use \App\Http\Controllers\ProyectosController;
use \App\Http\Controllers\UsuariosController;
use \App\Http\Controllers\BuscarController;




Route::get('/', function () {
    return view('welcome');
});

//---Rutas Tareas---//
Route::get('/tareas', "\App\Http\Controllers\TareasController@index")
    ->name('tarea.index');

Route::get('/tareas/{id}',[TareasController::class,
    'show'])->whereNumber('id')->name('tareas.show');

Route::get('/tareas/crear','App\Http\Controllers\TareasController@create')
    ->name('tarea.crear');

Route::post('/tareas/crear','App\Http\Controllers\TareasController@store')
    ->name('tarea.store');

Route::get('/tareas/{id}/editar',[TareasController::class, 'edit'])
    ->whereNumber('id')->name('tareas.edit');

Route::put('/tareas/{id}/editar',[TareasController::class, 'update'])
    ->whereNumber('id')->name('tareas.update');

Route::delete('/tareas/{id}/borrar',[TareasController::class, 'destroy'])
    ->whereNumber('id')->name('tarea.borrar');


//---Rutas Proyecto---//

Route::get('/proyectos', "\App\Http\Controllers\ProyectosController@index")
    ->name('proyecto.index');

Route::get('/proyectos/{id}',[ProyectosController::class,'show'])
    ->whereNumber('id')->name('proyectos.show');

Route::get('/proyectos/crear','App\Http\Controllers\ProyectosController@create')
    ->name('proyecto.crear');

Route::post('/proyectos/crear','App\Http\Controllers\ProyectosController@store')
    ->name('proyecto.store');

Route::get('/proyectos/{id}/editar',[ProyectosController::class, 'edit'])
    ->whereNumber('id')->name('proyectos.edit');

Route::put('/proyectos/{id}/editar',[ProyectosController::class, 'update'])
    ->whereNumber('id')->name('proyectos.update');

Route::delete('/proyectos/{id}/borrar',[ProyectosController::class, 'destroy'])
    ->whereNumber('id')->name('proyectos.borrar');



//---Rutas Usuario---//

Route::get('/usuarios', "\App\Http\Controllers\UsuariosController@index")
    ->name('usuario.index');

Route::get('/usuarios/{id}',[UsuariosController::class,'show'])
    ->whereNumber('id')->name('usuarios.show');

Route::get('/usuarios/crear','App\Http\Controllers\UsuariosController@create')
    ->name('usuario.crear');

Route::post('/pusuarios/crear','App\Http\Controllers\UsuariosController@store')
    ->name('usuario.store');

Route::get('/usuario/{id}/editar',[UsuariosController::class, 'edit'])
    ->whereNumber('id')->name('usuarios.edit');

Route::put('/usuarios/{id}/editar',[UsuariosController::class, 'update'])
    ->whereNumber('id')->name('usuario.update');

Route::delete('/usuarios/{id}/borrar',[UsuariosController::class, 'destroy'])
    ->whereNumber('id')->name('usuario.borrar');


Route::get('/buscar', [BuscarController::class, 'buscar'])->name('tareas.buscar');


