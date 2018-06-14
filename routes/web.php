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

Route::group(['prefix' => 'admin'], function(){
   
   Route::get('/',function() {
      return view('admin.dashboard');
   });
   
   Route::resource('usuarios/docentes', 'DocentesController');
   Route::get('usuarios/docentes/{id}/destroy', [
            'uses' => 'DocentesController@destroy',
            'as'   => 'docentes.destroy'    
   ]);
   
   Route::resource('usuarios/acudientes', 'AcudientesController');
   Route::get('usuarios/acudientes/{id}/destroy', [
            'uses' => 'AcudientesController@destroy',
            'as'   => 'acudientes.destroy'
   ]);
   
   Route::resource('usuarios/estudiantes', 'EstudiantesController');
   Route::get('usuarios/Estudiantes/{id}/destroy', [
            'uses' => 'EstudiantesController@destroy',
            'as' =>   'estudiantes.destroy'
   ]);
   // Ruta para selector dinamico
   
   Route::resource('jornadas', 'JornadasController');
   Route::get('jornadas/{id}/destroy', [
           'uses' => 'JornadasController@destroy',
           'as'   => 'jornadas.destroy'
   ]);
   
   Route::resource('grados', 'GradosController');
   Route::get('grados/{id}/destroy', [
            'uses' => 'GradosController@destroy',
            'as'   => 'grados.destroy'
   ]);
   
   Route::resource('grupos', 'GruposController');
   Route::get('grupos/{id}/destroy', [
            'uses' => 'GruposController@destroy',
            'as'   => 'grupos.destroy'
   ]);
   
   Route::resource('periodos', 'PeriodosController');
   Route::get('periodos/{id}/destroy', [
      'uses' => 'PeriodosController@destroy',
      'as' => 'periodos.destroy'
   ]);
   
   Route::resource('cursos', 'CursosController');
   Route::get('cursos/{id}/destroy', [
      'uses' => 'CursosController@destroy',
      'as' => 'cursos.destroy'
   ]);

   Route::get('cargarGrados','CursosController@loadGrados');
   Route::get('cargarGrupos','GruposController@loadGroups');
   Route::get('cargarGrupos2','CursosController@loadGroups');
});


Route::group(['prefix' => 'docentes'], function() {
   
   Route::get('/',function() {
      return view('layouts.docentes');
   });
   
   Route::get('recursos/cargar_grados','Docente\AjaxController@loadGrados');
   Route::get('recursos/cargar_grupos','Docente\AjaxController@loadGroups');
   Route::get('recursos/cargar_cursos','Docente\AjaxController@loadCourses');
   Route::get('listar_estudiantes','Docente\ListarEstudiantesController@index');
   Route::get('actividades','Docente\ActividadesController@index');
   Route::get('calificaciones','Docente\CalificacionesController@index');
   Route::get('observaciones','Docente\ObservacionesController@index');

});