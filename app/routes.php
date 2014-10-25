<?php

Route::get('/', ['as' => 'login', 'uses' => 'BaseController@setupLayout']);


//login y logout
Route::post('login', ['as' => 'login', 'uses' => 'UserLogin@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UserLogin@logOut']);

//metodo para crear menu
Route::get('menu', ['as' => 'menu', 'uses' => 'ModulosController@getModulos']);


//mantinimiento de modulos
Route::get('modulos', ['as' => 'modulos', 'uses' => 'ModulosController@index']);
Route::post('modulos/list', ['as' => 'listModulos', 'uses' => 'ModulosController@listar']);
Route::post('modulos/update', ['as' => 'updateModulos', 'uses' => 'ModulosController@editar']);
Route::post('modulos/create', ['as' => 'createModulos', 'uses' => 'ModulosController@nuevo']);
Route::post('modulos/delete', ['as' => 'deleteModulos', 'uses' => 'ModulosController@eliminar']);
Route::post('modulos/parents', ['as' => 'parentsModulos', 'uses' => 'ModulosController@padres']);

//perfiles
Route::get('perfiles', ['as' => 'perfiles', 'uses' => 'PerfilesController@index']);
Route::post('perfiles/list', ['as' => 'listPerfiles', 'uses' => 'PerfilesController@listar']);
Route::post('perfiles/update', ['as' => 'updatePerfiles', 'uses' => 'PerfilesController@editar']);
Route::post('perfiles/create', ['as' => 'createPerfiles', 'uses' => 'PerfilesController@nuevo']);
Route::post('perfiles/delete', ['as' => 'deletePerfiles', 'uses' => 'PerfilesController@eliminar']);

//permisos
Route::get('permisos', ['as' => 'permisos', 'uses' => 'PermisosController@index']);
Route::get('permisos/getPerfils', ['as' => 'permisos.getPerfiles', 'uses' => 'PerfilesController@listar']);
Route::get('permisos/listar', ['as' => 'permisos.listar', 'uses' => 'PermisosController@listar']);
Route::get('permisos/getPermisos', ['as' => 'permisos.getPermisos', 'uses' => 'PermisosController@getPermisos']);
Route::post('permisos/add', ['as' => 'permisos.add', 'uses' => 'PermisosController@add']);
Route::post('permisos/del', ['as' => 'permisos.del', 'uses' => 'PermisosController@destroy']);


//users
Route::get('usuarios', ['as' => 'usuarios', 'uses' => 'UsersController@index']);
Route::post('usuarios/list', ['as' => 'usuarios.list', 'uses' => 'UsersController@listar']);
Route::post('usuarios/update', ['as' => 'usuarios.update', 'uses' => 'UsersController@editar']);
Route::post('usuarios/create', ['as' => 'usuarios.create', 'uses' => 'UsersController@nuevo']);
Route::post('usuarios/delete', ['as' => 'usuarios.delete', 'uses' => 'UsersController@eliminar']);
Route::post('usuarios/getPerfiles', ['as' => 'usuarios.getPerfiles', 'uses' => 'PerfilesController@getPerfiles']);
Route::post('usuarios/getFacultad', ['as' => 'usuarios.getFacultad', 'uses' => 'UsersController@eliminar']);

