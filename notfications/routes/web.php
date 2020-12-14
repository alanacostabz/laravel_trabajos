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

Route::resource('posts', 'PostsController');

Route::get('/messages/create', 'MessagesController@create')->name('messages.create');
Route::post('/messages', 'MessagesController@store')->name('messages.store');
Route::get('/messages/{id}', 'MessagesController@show')->name('messages.show');
Route::get('notificaciones', 'NotificationsController@index')->name('notifications.index');
Route::patch('notificaciones/{id}', 'NotificationsController@read')->name('notifications.read');
Route::delete('notificaciones/{id}', 'NotificationsController@destroy')->name('notifications.destroy');
