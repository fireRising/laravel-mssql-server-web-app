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

Route::get('/', 'ServicesController@index');
Route::get('/visit/create', 'VisitsController@create');
Route::post('/visit','VisitsController@post');
Route::get('/visit', 'VisitsController@showFreeMasters');

Route::get('/visits/about', 'HomeController@about_visits_to_master');
Route::get('/visits/service_provided', 'HomeController@service_provided');
Route::post('/visits/service_provided/change', 'HomeController@change_service_provided');
Route::get('/visits/change', 'HomeController@change_info');
Route::post('/visits/update', 'HomeController@update_info_post');
Route::post('/visits/delete', 'HomeController@delete_info_post');

Route::get('/admin/visits/show', 'HomeController@admin_visits_show');
Route::get('/admin/staff_schedule/show', 'HomeController@staff_schedule_show');
Route::get('/admin/services/show', 'HomeController@services_show');
Route::get('/admin/services_group/change', 'HomeController@services_group_change');
Route::post('/admin/services_group/change', 'HomeController@services_group_change_post');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
