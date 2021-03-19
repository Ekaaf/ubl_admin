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

// Route::get('/', 'AdminController@index')->name('index');
Route::get('/login', 'AdminController@login')->name('login');
Route::post('/postlogin', 'AdminController@postlogin')->name('postlogin');
Route::get('/logout', 'AdminController@logout')->name('logout');

Route::group(array('prefix' => 'admin','middleware' => 'admin'), function()
{	
	Route::get('/import', array('as' => 'import', 'uses' => 'AdminController@import'));
	Route::post('/saveImport', array('as' => 'saveImport', 'uses' => 'AdminController@saveImport'));
	Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'AdminController@dashboard'));
	Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'AdminController@dashboard'));
	Route::get('/store', array('as' => 'dashboard', 'uses' => 'AdminController@store'));
	Route::post('/store/updatestore', array('as' => 'updatestore', 'uses' => 'AdminController@updatestore'));
	Route::get('/store/delete/{id}', array('as' => 'deletestore', 'uses' => 'AdminController@deletestore'));

	Route::post('/audit/updateaudit', array('as' => 'updateaudit', 'uses' => 'AdminController@updateaudit'));
	Route::get('/audit/delete/{id}', array('as' => 'deleteaudit', 'uses' => 'AdminController@deleteaudit'));

	Route::get('/getTerritorries', array('as' => 'getTerritorries', 'uses' => 'AdminController@getTerritorries'));
	Route::get('/getTowns', array('as' => 'getTowns', 'uses' => 'AdminController@getTowns'));
	Route::get('/getStores', array('as' => 'getStores', 'uses' => 'AdminController@getStores'));
	Route::get('/getstorelist', array('as' => 'getstorelist', 'uses' => 'AdminController@getstorelist'));

	Route::get('/audit', array('as' => 'audit', 'uses' => 'AdminController@audit'));
	Route::get('/getAudit', array('as' => 'getAudit', 'uses' => 'AdminController@getAudit'));

	Route::get('/user/add', array('as' => 'useradd', 'uses' => 'AdminController@userAdd'));
	Route::post('/user/usersave', array('as' => 'usersave', 'uses' => 'AdminController@userSave'));
	Route::get('/user/index', array('as' => 'index', 'uses' => 'AdminController@userList'));
	Route::get('/user/getusers', array('as' => 'getusers', 'uses' => 'AdminController@getUsers'));
	Route::get('/user/{id}/edit', array('as' => 'edituser', 'uses' => 'AdminController@userEdit'));
	Route::get('/user/delete/{id}', array('as' => 'delete', 'uses' => 'AdminController@userDelete'));
	Route::get('/store/{id}/edit', array('as' => 'storeedit', 'uses' => 'AdminController@storeedit'));
	

	Route::get('/audit/{id}/edit', array('as' => 'storeedit', 'uses' => 'AdminController@auditedit'));
    
    Route::get('/dailyvisit', array('as' => 'dailyvisit', 'uses' => 'AdminController@dailyvisit'));
    Route::get('/getDailyvisit', array('as' => 'getDailyvisit', 'uses' => 'AdminController@getDailyvisit'));
    Route::post('/dailyvisit/updatedailyvisit', array('as' => 'updatedailyvisit', 'uses' => 'AdminController@updatedailyvisit'));
    Route::get('/dailyvisit/delete/{id}', array('as' => 'dailyvisitdelete', 'uses' => 'AdminController@deletedailyvisit'));
    Route::get('/getDoctorInfo', array('as' => 'getDoctorInfo', 'uses' => 'AdminController@getDoctorInfo'));
    Route::get('/dailyvisit/{id}/edit', array('as' => 'dailyvisitedit', 'uses' => 'AdminController@dailyvisitedit'));
    

    Route::get('/doctor/add', array('as' => 'doctoradd', 'uses' => 'AdminController@doctoradd'));
    Route::post('/doctor/saveDoctor', array('as' => 'saveDoctor', 'uses' => 'AdminController@saveDoctor'));
    Route::get('/doctor/index', array('as' => 'doctors', 'uses' => 'AdminController@doctors'));
    Route::get('/getDoctors', array('as' => 'getDoctors', 'uses' => 'AdminController@getDoctors'));
    Route::get('/doctor/{id}/edit', array('as' => 'doctorsedit', 'uses' => 'AdminController@doctorsedit'));
    Route::post('/doctors/updatedoctor', array('as' => 'updatedoctor', 'uses' => 'AdminController@updatedoctor'));
    Route::get('/doctor/delete/{id}', array('as' => 'deletedoctors', 'uses' => 'AdminController@deletedoctor'));

	Route::post('/user/updateuser', array('as' => 'updateuser', 'uses' => 'AdminController@updateuser'));

	Route::get('/options/add', array('as' => 'optionadd', 'uses' => 'AdminController@optionsadd'));
	Route::get('/options', array('as' => 'options', 'uses' => 'AdminController@options'));
	Route::post('/options/save', array('as' => 'saveoptions', 'uses' => 'AdminController@saveoptions'));
	Route::get('/getOptions', array('as' => 'getOptions', 'uses' => 'AdminController@getOptions'));
	Route::get('/options/{id}/edit', array('as' => 'optionsedit', 'uses' => 'AdminController@optionsedit'));
	Route::post('/options/updateoption', array('as' => 'updateoption', 'uses' => 'AdminController@updateoption'));
	Route::get('/options/delete/{id}', array('as' => 'deleteoptions', 'uses' => 'AdminController@deleteoptions'));

	Route::get('/storedashboard', array('as' => 'storedashboard', 'uses' => 'AdminController@storedashboard'));
	Route::get('/dailyvisitdashboard', array('as' => 'dailyvisitdashboard', 'uses' => 'AdminController@dailyvisitdashboard'));
	Route::get('/storedashboard', array('as' => 'storedashboard', 'uses' => 'AdminController@storedashboard'));

	Route::get('/regdentalcamp',array('as' => 'users', 'uses' => 'AdminController@regdentalcamp'));
	Route::get('/showRegDentalCamp',array('as' => 'users', 'uses' => 'AdminController@showRegDentalCamp'));
	Route::get('/editdentalcamp/{id}',array('as' => 'users', 'uses' => 'AdminController@editDentalCamp'));
	Route::post('/dentalcampeditprocess/{id}',array('as'=>'users', 'uses'=>'AdminController@dentalcampeditprocess'));
	Route::get('/deletedentalcamp/{id}', array('as' => 'deleteuser', 'uses' => 'AdminController@deleteDentalCamp'));


    Route::get('/users',array('as' => 'users', 'uses' => 'AdminController@users'));
    Route::get('/showusers',array('as' => 'users', 'uses' => 'AdminController@showusers'));
    Route::get('/editusers/{id}',array('as' => 'users', 'uses' => 'AdminController@editusers'));
    Route::post('/usereditprocess/{id}',array('as'=>'users', 'uses'=>'AdminController@usereditprocess'));
    Route::get('/deleteuser/{id}', array('as' => 'deleteuser', 'uses' => 'AdminController@deleteuser'));

    Route::get('/samplecollection',array('as' => 'users', 'uses' => 'AdminController@samplecollection'));
    Route::get('/showsamplecollection',array('as' => 'users', 'uses' => 'AdminController@showsamplecollection'));
  //  Route::get('/editusers/{id}',array('as' => 'users', 'uses' => 'AdminController@editusers'));
  //  Route::post('/usereditprocess/{id}',array('as'=>'users', 'uses'=>'AdminController@usereditprocess'));
    Route::get('/deleteuser/{id}', array('as' => 'deleteuser', 'uses' => 'AdminController@deleteuser'));

    Route::get('/search',array('as' => 'users', 'uses' => 'AdminController@search'));
    Route::get('/showsearch',array('as' => 'users', 'uses' => 'AdminController@showsearch'));




});


Route::group(array('prefix' => 'bdo','middleware' => 'bdo'), function()
{
	Route::get('/store', array('as' => 'dashboard', 'uses' => 'AdminController@store'));
	Route::post('/store/updatestore', array('as' => 'updatestore', 'uses' => 'AdminController@updatestore'));
	Route::get('/store/delete/{id}', array('as' => 'deletestore', 'uses' => 'AdminController@deletestore'));

	Route::post('/audit/updateaudit', array('as' => 'updateaudit', 'uses' => 'AdminController@updateaudit'));
	Route::get('/audit/delete/{id}', array('as' => 'deleteaudit', 'uses' => 'AdminController@deleteaudit'));

	Route::get('/getTerritorries', array('as' => 'getTerritorries', 'uses' => 'AdminController@getTerritorries'));
	Route::get('/getTowns', array('as' => 'getTowns', 'uses' => 'AdminController@getTowns'));
	Route::get('/getstorelist', array('as' => 'getstorelist', 'uses' => 'AdminController@getstorelist'));

	Route::get('/audit', array('as' => 'audit', 'uses' => 'AdminController@audit'));
	Route::get('/getAudit', array('as' => 'getAudit', 'uses' => 'AdminController@getAudit'));

	Route::get('/store/{id}/edit', array('as' => 'storeedit', 'uses' => 'AdminController@storeedit'));
	Route::get('/dailyvisit/{id}/edit', array('as' => 'dailyvisitedit', 'uses' => 'AdminController@dailyvisitedit'));

	Route::get('/audit/{id}/edit', array('as' => 'storeedit', 'uses' => 'AdminController@auditedit'));
    
    Route::get('/dailyvisit', array('as' => 'dailyvisit', 'uses' => 'AdminController@dailyvisit'));
    Route::get('/getDailyvisit', array('as' => 'getDailyvisit', 'uses' => 'AdminController@getDailyvisit'));
    Route::post('/dailyvisit/updatedailyvisit', array('as' => 'updatedailyvisit', 'uses' => 'AdminController@updatedailyvisit'));
    Route::get('/dailyvisit/delete/{id}', array('as' => 'dailyvisitdelete', 'uses' => 'AdminController@deletedailyvisit'));


});


Route::group(array('prefix' => 'reportuser','middleware' => 'reportuser'), function()
{
	Route::get('/store', array('as' => 'dashboard', 'uses' => 'AdminController@store'));
	Route::post('/store/updatestore', array('as' => 'updatestore', 'uses' => 'AdminController@updatestore'));
	Route::get('/store/{id}/edit', array('as' => 'storeedit', 'uses' => 'AdminController@storeedit'));
	Route::get('/store/delete/{id}', array('as' => 'deletestore', 'uses' => 'AdminController@deletestore'));
	Route::get('/getstorelist', array('as' => 'getstorelist', 'uses' => 'AdminController@getstorelist'));

	Route::get('/audit', array('as' => 'audit', 'uses' => 'AdminController@audit'));
	Route::get('/getAudit', array('as' => 'getAudit', 'uses' => 'AdminController@getAudit'));
	Route::get('/audit/{id}/edit', array('as' => 'storeedit', 'uses' => 'AdminController@auditedit'));
	Route::post('/audit/updateaudit', array('as' => 'updateaudit', 'uses' => 'AdminController@updateaudit'));
	Route::get('/audit/delete/{id}', array('as' => 'deleteaudit', 'uses' => 'AdminController@deleteaudit'));

	Route::get('/storedashboard', array('as' => 'storedashboard', 'uses' => 'AdminController@storedashboard'));
	Route::get('/dailyvisitdashboard', array('as' => 'dailyvisitdashboard', 'uses' => 'AdminController@dailyvisitdashboard'));
	Route::get('/storedashboard', array('as' => 'storedashboard', 'uses' => 'AdminController@storedashboard'));
});
