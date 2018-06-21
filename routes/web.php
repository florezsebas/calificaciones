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

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/cambiar_contraseña','ChangePassword@showChangePasswordForm');
Route::post('/changePassword','ChangePassword@changePassword')->name('changePassword');

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
   
   //Route::resource('cursos', 'CursosController');
   Route::get('cursos','CursosController@index')->name('cursos.index');
   Route::get('cursos/create/{periodo_id}', [
      'uses' => 'CursosController@create',
      'as' => 'cursos.create'
   ]);
   Route::post('cursos/store/{periodo_id}', [
      'uses' => 'CursosController@store',
      'as' => 'cursos.store'
   ]);
   Route::get('cursos/edit/{periodo_id}/{curso_id}', [
      'uses' => 'CursosController@edit',
      'as' => 'cursos.edit'
   ]);
   Route::put('cursos/update/{periodo_id}/{curso_id}', [
      'uses' => 'CursosController@update',
      'as' => 'cursos.update'
   ]);
   Route::get('cursos/destroy/{periodo_id}/{curso_id}', [
      'uses' => 'CursosController@destroy',
      'as' => 'cursos.destroy'
   ]);
   Route::get('cursos/list/{periodo_id}', [
      'uses' => 'CursosController@listarCursos',
      'as' => 'cursos.list'
   ]);

   Route::get('gradosparacursos','AjaxController@loadGradosForCourse');
   Route::get('gruposparagrupos','AjaxController@loadGroupsForGroup');
   Route::get('gruposparacursos','AjaxController@loadGroupsForCourse');
   Route::get('gradosparaestudiante','AjaxController@loadGradosForStudent');
   Route::get('gruposparaestudiante','AjaxController@loadGroupsForStudent');
});


Route::group(['prefix' => 'docentes', 'middleware' => ['auth', 'teacher']], function() {
   
   Route::get('/',function() {
      return view('docentes.dashboard');
   })->name('portal.docente');
  
   Route::get('estudiantes','Docente\ListarEstudiantesController@index')->name('listar.estudiantes.index');
   Route::get('estudiantes/list/{id}', [
      'uses' => 'Docente\ListarEstudiantesController@listingStudents',
      'as' => 'estudiantes.list'
   ]);
   
   Route::get('actividades','Docente\ActividadesController@index')->name('actividades.index');
   Route::get('actividades/list/{periodo_id}/{curso_id}', [
      'uses' => 'Docente\ActividadesController@listingActivities',
      'as' => 'actividades.list'
   ]);
   Route::get('actividades/create/{periodo_id}/{curso_id}', [
      'uses' => 'Docente\ActividadesController@create',
      'as' => 'actividades.create'
   ]);
   Route::post('actividades/store/{periodo_id}/{curso_id}', [
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
   Route::get('actividades/cursos/{periodo_id}', [
      'uses' => 'Docente\ActividadesController@listarCursos',
      'as' => 'actividades.cursos'
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
   Route::get('calificaciones/create/{curso_id}/{act_id}/{user_id}', [
      'uses' => 'Docente\CalificacionesController@create',
      'as' => 'calificaciones.create'
   ]);
   Route::post('calificaciones/store/{curso_id}/{act_id}/{user_id}', [
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
   Route::get('observaciones/create/{curso_id}/{user_id}', [
      'uses' => 'Docente\ObservacionesController@create',
      'as' => 'observaciones.create'
   ]);
   Route::post('observaciones/store/{curso_id}/{user_id}', [
      'uses' => 'Docente\ObservacionesController@store',
      'as' => 'observaciones.store'
   ]);
   Route::get('observaciones/edit/{obs_id}', [
      'uses' => 'Docente\ObservacionesController@edit',
      'as' => 'observaciones.edit'
   ]);
   Route::get('observaciones/show/{curso_id}/{user_id}/{obs_id}', [
      'uses' => 'Docente\ObservacionesController@show',
      'as' => 'observaciones.show'
   ]);
   Route::get('observaciones/destroy/{obs_id}', [
      'uses' => 'Docente\ObservacionesController@destroy',
      'as' => 'observaciones.destroy'
   ]);
   Route::put('observaciones/update/{obs_id}', [
      'uses' => 'Docente\ObservacionesController@update',
      'as' => 'observaciones.update'
   ]);

});

Route::group(['prefix' => 'estudiantes', 'middleware' => ['auth', 'student']], function() {

   Route::get('/',function() {
      return view('estudiantes.dashboard');
   });
   
   Route::get('calificaciones','Estudiante\CalificacionesController@index')->name('calificaciones.index');
   
});

Route::group(['prefix' => 'acudientes', 'middleware' => ['auth', 'attendant']], function() {

   Route::get('/',function() {
      return view('acudientes.dashboard');
   });
   
   Route::get('calificaciones','Acudiente\CalificacionesEstudiantesController@index')->name('calificaciones.acudientes.index');
   Route::post('calificaciones/list', [
      'uses' => 'Acudiente\CalificacionesEstudiantesController@listingGrades',
      'as' => 'calificaciones.list'
   ]);
   
   Route::get('observaciones','Acudiente\ObservacionesEstudiantesController@index')->name('observaciones.acudientes.index');
   Route::get('observaciones/cursos/{user_id}', [
      'uses' => 'Acudiente\ObservacionesEstudiantesController@listingCourses',
      'as' => 'observaciones.cursos'
   ]);
   Route::get('observaciones/list/{course_id}/{user_id}', [
      'uses' => 'Acudiente\ObservacionesEstudiantesController@listingObservations',
      'as' => 'observaciones.list'
   ]);
   Route::get('observaciones/descripcion/{obs_id}/{course_id}/{user_id}', [
      'uses' => 'Acudiente\ObservacionesEstudiantesController@mostrarObservation',
      'as' => 'observaciones.descripcion'
   ]);
   
});