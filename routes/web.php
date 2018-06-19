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


//Route::auth();

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
   
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
   Route::get('usuarios/estudiantes/{id}/destroy', [
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

   Route::get('gradosparacursos','AjaxController@loadGradosForCourse');
   Route::get('gruposparagrupos','AjaxController@loadGroupsForGroup');
   Route::get('gruposparacursos','AjaxController@loadGroupsForCourse');
   Route::get('gradosparaestudiante','AjaxController@loadGradosForStudent');
   Route::get('gruposparaestudiante','AjaxController@loadGroupsForStudent');
});


Route::group(['prefix' => 'docentes', 'middleware' => ['auth', 'teacher']], function() {
   
   Route::get('/',function() {
      return view('layouts.docentes');
   })->name('portal.docente');
  
   Route::get('estudiantes','Docente\ListarEstudiantesController@index')->name('listar.estudiantes.index');
   Route::get('estudiantes/list/{id}', [
      'uses' => 'Docente\ListarEstudiantesController@listingStudents',
      'as' => 'estudiantes.list'
   ]);
   
   Route::get('actividades','Docente\ActividadesController@index')->name('actividades.index');
   Route::get('actividades/list/{id}', [
      'uses' => 'Docente\ActividadesController@listingActivities',
      'as' => 'actividades.list'
   ]);
   Route::get('actividades/create/{curso_id}', [
      'uses' => 'Docente\ActividadesController@create',
      'as' => 'actividades.create'
   ]);
   Route::post('actividades/store/{curso_id}', [
      'uses' => 'Docente\ActividadesController@store',
      'as' => 'actividades.store'
   ]);
   Route::get('actividades/edit/{act_id}', [
      'uses' => 'Docente\ActividadesController@edit',
      'as' => 'actividades.edit'
   ]);
   Route::put('actividades/update/{act_id}', [
      'uses' => 'Docente\ActividadesController@update',
      'as' => 'actividades.update'
   ]);
   Route::get('actividades/destroy/{act_id}', [
      'uses' => 'Docente\ActividadesController@destroy',
      'as' => 'actividades.destroy'
   ]);


   Route::get('calificaciones','Docente\CalificacionesController@index')->name('calificaciones.docentes.index');
   Route::get('calificaciones/actividades/{curso_id}', [
      'uses' => 'Docente\CalificacionesController@listingActivities',
      'as' => 'calificaciones.actividades.list'
   ]);
   Route::get('calificaciones/estudiantes/{curso_id}/{act_id}', [
      'uses' => 'Docente\CalificacionesController@listingStudents',
      'as' => 'calificaciones.estudiantes.list'
   ]);
   Route::post('calificaciones/store/{curso_id}/{act_id}', [
      'uses' => 'Docente\CalificacionesController@store',
      'as' => 'calificaciones.store'
   ]);


   Route::get('observaciones','Docente\ObservacionesController@index')->name('observaciones.index');
   Route::get('observaciones/estudiantes/{curso_id}', [
      'uses' => 'Docente\ObservacionesController@listingStudents',
      'as' => 'observaciones.estudiantes'
   ]);
   Route::get('observaciones/listar/{curso_id}/{user_id}', [
      'uses' => 'Docente\ObservacionesController@observationStudents',
      'as' => 'observaciones.listar'
   ]);
   Route::get('observaciones/crear/{curso_id}/{user_id}', [
      'uses' => 'Docente\ObservacionesController@crear',
      'as' => 'observaciones.crear'
   ]);
   Route::post('observaciones/almacenar/{curso_id}/{user_id}', [
      'uses' => 'Docente\ObservacionesController@almacenar',
      'as' => 'observaciones.almacenar'
   ]);
   Route::get('observaciones/editar/{obs_id}', [
      'uses' => 'Docente\ObservacionesController@editar',
      'as' => 'observaciones.editar'
   ]);
   Route::get('observaciones/destruir/{obs_id}', [
      'uses' => 'Docente\ObservacionesController@destruir',
      'as' => 'observaciones.destruir'
   ]);
   Route::put('observaciones/actualizar/{obs_id}', [
      'uses' => 'Docente\ObservacionesController@actualizar',
      'as' => 'observaciones.actualizar'
   ]);

});

Route::group(['prefix' => 'estudiantes', 'middleware' => ['auth', 'student']], function() {

   Route::get('/',function() {
      return view('layouts.estudiantes');
   });
   
   Route::get('calificaciones','Estudiante\ListarCalificacionesController@index')->name('calificaciones.index');
   
});

Route::group(['prefix' => 'acudientes', 'middleware' => ['auth', 'student']], function() {

   Route::get('/',function() {
      return view('layouts.acudientes');
   });
   
   Route::get('calificaciones','Acudiente\ListarCalificacionesController@index');
   Route::get('calificaciones/list/{user_id}', [
      'uses' => 'Acudiente\ListarCalificacionesController@listingGrades',
      'as' => 'calificaciones.list'
   ]);
   
   Route::get('observaciones','Acudiente\ListarObservacionesController@index');
   Route::get('observaciones/cursos/{user_id}', [
      'uses' => 'Acudiente\ListarObservacionesController@listingCourses',
      'as' => 'observaciones.cursos'
   ]);
   Route::get('observaciones/list/{course_id}/{user_id}', [
      'uses' => 'Acudiente\ListarObservacionesController@listingObservations',
      'as' => 'observaciones.list'
   ]);
   Route::get('observaciones/descripcion/{obs_id}', [
      'uses' => 'Acudiente\ListarObservacionesController@mostrarObservation',
      'as' => 'observaciones.descripcion'
   ]);
   
});