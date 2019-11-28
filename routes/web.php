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

/**
 * Project Routes
 */
Route::get('/projects', 'ProejctController@index')->name('projects.index');
Route::get('/projects/completed', 'ProjectController@index_completed')->name('projects.index.completed');
Route::get('/projects/ongoing', 'ProjectController@index_ongoing')->name('projects.index.ongoing');
Route::get('/projects/pending', 'ProjectController@index_pending')->name('projects.index.pending');
Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
Route::post('/projects', 'ProjectController@store')->name('projects.store');
Route::get('/projects/{project}/show', 'ProjectController@show')->name('projects.show');
Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('projects.edit');
Route::put('/projects/{project}/update', 'ProjectController@update')->name('projects.update');
Rouet::delete('/projects/{project}/delete', 'ProjectController@destroy')->name('projects.delete');


/**
 * Task Routes
 */

 Route::get('/tasks', 'TaskController@index')->name('tasks.index');
 Route::get('/tasks/{project}/index', 'TaskController@index_project')->name('tasks.index.project');
 Route::get('/tasks/{project}/completed', 'TaskController@index_project_completed')->name('tasks.index.project.completed');
 Route::get('tasks/{project}/onging', 'TaskController@index_project_ongoing')->name('tasks.index.project.ongoing');
 Route::get('/tasks/{project}/pending', 'TaskController@index_project_pending')->name('tasks.index.project.pending');
 Route::get('/tasks/completed', 'TaskController@completed')->name('tasks.completed');
 Route::get('/tasks/ongoing', 'TaskController@ongoing')->name('tasks.ongoing');
 Route::get('/tasks/pending', 'TaskController@pending')->name('tasks.pending');
 Route::get('/tasks/{project}/create', 'TaskController@create')->name('tasks.create');
 Route::post('/tasks/{project}', 'TaskController@store')->name('tasks.store');
 Route::get('/tasks/{task}/show', 'TaskController@show')->name('tasks.show');
 Route::get('/tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
 Route::put('/tasks/{task}/update', 'TaskController@update')->name('tasks.update');
 Route::delete('/tasks/{task}/delete', 'TaskController@delete')->name('tasks.delete');

/**
 * Company Routes
 */

 Route::get('/companies/show', 'CompanyController@show')->name('companies.show');
 Route::get('/companies/edit', 'CompanyController@edit')->name('companies.edit');
 Route::put('companies/update', 'CompanyController@update')->name('companies.update');
