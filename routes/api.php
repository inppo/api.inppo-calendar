<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// api routes that need auth

Route::middleware(['auth:api'])->group(function () {


});

Route::get('home', 'HomeController@index');


/* routes for Event Controller  */	
	Route::get('event/', 'EventController@index');
	Route::get('event/index', 'EventController@index');
	Route::get('event/index/{filter?}/{filtervalue?}', 'EventController@index');	
	Route::get('event/view/{rec_id}', 'EventController@view');	
	Route::post('event/add', 'EventController@add');	
	Route::any('event/edit/{rec_id}', 'EventController@edit');	
	Route::any('event/delete/{rec_id}', 'EventController@delete');

/* routes for Permissions Controller  */	
	Route::get('permissions/', 'PermissionsController@index');
	Route::get('permissions/index', 'PermissionsController@index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view');	
	Route::post('permissions/add', 'PermissionsController@add');	
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit');	
	Route::any('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Roles Controller  */	
	Route::get('roles/', 'RolesController@index');
	Route::get('roles/index', 'RolesController@index');
	Route::get('roles/index/{filter?}/{filtervalue?}', 'RolesController@index');	
	Route::get('roles/view/{rec_id}', 'RolesController@view');	
	Route::post('roles/add', 'RolesController@add');	
	Route::any('roles/edit/{rec_id}', 'RolesController@edit');	
	Route::any('roles/delete/{rec_id}', 'RolesController@delete');

/* routes for User Controller  */	
	Route::get('user/', 'UserController@index');
	Route::get('user/index', 'UserController@index');
	Route::get('user/index/{filter?}/{filtervalue?}', 'UserController@index');	
	Route::get('user/view/{rec_id}', 'UserController@view');	
	Route::post('auth/register', 'AuthController@register');	
	Route::any('account/edit', 'AccountController@edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword');	
	Route::get('account/currentuserdata', 'AccountController@currentuserdata');	
	Route::post('user/add', 'UserController@add');	
	Route::any('user/edit/{rec_id}', 'UserController@edit');	
	Route::any('user/delete/{rec_id}', 'UserController@delete');
	
	Route::get('components_data/role_id_option_list/{arg1?}', 'Components_dataController@role_id_option_list');	
	Route::get('components_data/user_username_exist/{arg1?}', 'Components_dataController@user_username_exist');	
	Route::get('components_data/user_email_address_exist/{arg1?}', 'Components_dataController@user_email_address_exist');


/* routes for FileUpload Controller  */	
Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');