<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('logout', 'AuthController@logout')->middleware('auth:api');
    Route::get('user', 'AuthController@user')->middleware('auth:api');
});

Route::group([
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::resource('tw_documentos','TwDocumentosController')->middleware('auth:api');
Route::resource('tw_users','UserController')->middleware('auth:api');
Route::resource('tw_corporativos','TwCorporativosController')->middleware('auth:api');
Route::resource('tw_contratos_corporativos','TwContratosCorporativosController')->middleware('auth:api');
Route::resource('tw_documentos_corporativos','TwDocumentosCorporativosController')->middleware('auth:api');
Route::resource('tw_empresas_corporativos','TwEmpresasCorporativosController')->middleware('auth:api');
Route::resource('tw_contactos_corporativos','TwContactosCorporativosController')->middleware('auth:api');

Route::get('corporativos/{id}','TwCorporativosController@obtenerCorporativo')->middleware('auth:api');

Route::get('documentos/{id}','TwDocumentosCorporativosController@obtenerDocumentos')->middleware('auth:api');
