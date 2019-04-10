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

//Routes
Route::middleware(['auth'])->group(function(){
    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
            ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
            ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
            ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
            ->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
            ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');

    //AttorneyClients
    Route::post('attorneyClients/store', 'AttorneyClientController@store')->name('attorneyClients.store')
            ->middleware('permission:attorneyClients.create');

    Route::get('attorneyClients', 'AttorneyClientController@index')->name('attorneyClients.index')
            ->middleware('permission:attorneyClients.index');

    Route::get('attorneyClients/create', 'AttorneyClientController@create')->name('attorneyClients.create')
            ->middleware('permission:attorneyClients.create');

    Route::put('attorneyClients/{client}', 'AttorneyClientController@update')->name('attorneyClients.update')
            ->middleware('permission:attorneyClients.edit');

    Route::get('attorneyClients/{client}', 'AttorneyClientController@show')->name('attorneyClients.show')
            ->middleware('permission:attorneyClients.show');

    Route::delete('attorneyClients/{client}', 'AttorneyClientController@destroy')->name('attorneyClients.destroy')
            ->middleware('permission:attorneyClients.destroy');

    Route::get('attorneyClients/{client}/edit', 'AttorneyClientController@edit')->name('attorneyClients.edit')
            ->middleware('permission:attorneyClients.edit');

    //Attorney
    Route::post('attorneys/store', 'AttorneyController@store')->name('attorneys.store')
            ->middleware('permission:attorneys.create');

    Route::get('attorneys', 'AttorneyController@index')->name('attorneys.index')
            ->middleware('permission:attorneys.index');

    Route::get('attorneys/create', 'AttorneyController@create')->name('attorneys.create')
            ->middleware('permission:attorneys.create');

    Route::put('attorneys/{id}', 'AttorneyController@update')->name('attorneys.update')
            ->middleware('permission:attorneys.edit');

    Route::get('attorneys/{id}', 'AttorneyController@show')->name('attorneys.show')
            ->middleware('permission:attorneys.show');

    Route::delete('attorneys/{id}', 'AttorneyController@destroy')->name('attorneys.destroy')
            ->middleware('permission:attorneys.destroy');

    Route::get('attorneys/{id}/edit', 'AttorneyController@edit')->name('attorneys.edit')
            ->middleware('permission:attorneys.edit');

    //Users
    Route::post('users/store', 'UserController@store')->name('users.store')
            ->middleware('permission:users.create');

    Route::get('users', 'UserController@index')->name('users.index')
            ->middleware('permission:users.index');

    Route::get('users/create', 'UserController@create')->name('users.create')
            ->middleware('permission:users.create');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
            ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
            ->middleware('permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
            ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
            ->middleware('permission:users.edit');
});
