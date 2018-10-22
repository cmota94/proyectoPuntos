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
    return view('auth/login');
});
 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//** Rutas para el caso de uso administrar USUARIOS.  **//

Route::get('/usuarios', 'UsuariosController@index');
Route::post('/usuarios', 'UsuariosController@index');
Route::get('/usuarios/registrar', 'UsuariosController@create');
Route::post('/usuarios/registrar', 'UsuariosController@store');
Route::get('/usuarios/{id?}', 'UsuariosController@show');
Route::get('/usuarios/actualizar/{id?}', 'UsuariosController@edit');
Route::post('/usuarios/actualizar/{id?}', 'UsuariosController@update');
Route::post('/usuarios/estatus/{id?}', 'UsuariosController@cambiarEstatus');
Route::post('/usuarios/eliminar/{id?}', 'UsuariosController@destroy');


//** Rutas para el caso de uso administrar EVENTOS.  **//

Route::get('/eventos', 'EventosController@index');
Route::post('/eventos', 'EventosController@index');
Route::get('/eventos/registrar', 'EventosController@create');
Route::post('/eventos/registrar', 'EventosController@store');
//Route::get('/eventos/{act_idActividad?}', 'EventosController@show');
Route::get('/eventos/actualizar/{act_idactividad?}', 'EventosController@edit');
Route::post('/eventos/actualizar/{act_idactividad?}', 'EventosController@update');
Route::post('/eventos/eliminar/{act_idactividad?}', 'EventosController@destroy');
//Route::post('/eventos/subir/{act_idActividad?}', 'EventosController@cargarPuntos');
Route::get('/eventos/subir/{act_idactividad?}', 'EventosController@subirPuntos');
Route::post('/eventos/subir', 'EventosController@registrarPuntos');
Route::get('/eventos/reporte/{act_idactividad?}', 'EventosController@mostrarDetallesEvento');
Route::get('/eventos/reporte/pdf/{act_idactividad?}', 'EventosController@generarReporte');
Route::post('/eventos/estatus/{act_idactividad?}', 'EventosController@cambiarEstatus');
Route::get('/eventos/show/{act_idactividad?}', 'EventosController@show');
	

Route::get('/eventos/cartas', 'PuntosController@cartasIndex');
Route::post('/eventos/cartas', 'PuntosController@cartasIndex');
Route::get('/eventos/cartaExpres/{alumIdAlumno?}', 'PuntosController@generarCartaExpres');


Route::get('/eventos/constancias', 'PuntosController@index');
Route::post('/eventos/constancias', 'PuntosController@index');
Route::get('/eventos/constancia/{alumIdAlumno?}', 'PuntosController@generarConstancia');
Route::get('/eventos/historialIndex', 'PuntosController@historial');
Route::post('/eventos/historialIndex', 'PuntosController@cargar');
Route::get('/eventos/historialIndex/historial', 'PuntosController@hist');

Route::get('/eventos/eventos', 'PuntosController@registrarPuntos');
Route::post('/eventos/eventos', 'PuntosController@registrarPuntos');


//** Rutas para el caso de uso administrar EMPLEADOS.  **//

Route::get('/empleados', 'EmpleadosController@index');
Route::post('/empleados', 'EmpleadosController@index');
Route::get('/empleados/registrar', 'EmpleadosController@create');
Route::post('/empleados/registrar', 'EmpleadosController@store');
Route::get('/empleados/{id?}', 'EmpleadosController@show');
Route::get('/empleados/actualizar/{id?}', 'EmpleadosController@edit');
Route::post('/empleados/actualizar/{id?}', 'EmpleadosController@update');
Route::post('/empleados/estatus/{id?}', 'EmpleadosController@cambiarEstatus');
Route::post('/empleados/eliminar/{id?}', 'EmpleadosController@destroy');

Route::get('/inscripciones', 'InscripcionesController@index');
Route::get('/inscripciones/registrar/{act_idactividad?}', 'InscripcionesController@create');