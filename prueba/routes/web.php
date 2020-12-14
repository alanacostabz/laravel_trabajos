<?php

use App\Jobs\SendEmail;

// Route::get('job', function () {
//   dispatch(new SendEmail);

//   return "Listo!";
// });


// DB::listen(function ($query) {
//   echo "<pre>{{$query->sql}}</pre>";
// });


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

// App\User::create([
//   'name' => 'Citlally Olmos',
//   'email' => 'mod@gmail.com',
//   'password' => bcrypt('Colonos2504')
// ]);

// www.misitio.com = Route::get('/');
// www.misitio.com/contact = Route::get('contacto', function(){});

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', ['uses' => 'PagesController@home'])->name('home')->middleware('example');

// Route::get('/contactanos', function () {
//     return view('contactos');
// })->name('contactos');

//Route::get('contactanos', ['uses' => 'PagesController@contact'])->name('contactos');
//Route::post('contacto', 'PagesController@mensajes');

// Route::get('/saludos/{nombre?}', function ($nombre = "Invitado") {
//     $html = "<h2>Contenido html</h2>"; // ingresado por formulario
//     $script = "<script>alert('Problema XSS - Cross Site Scriptiong')</script>";

//     // loop
//     $consolas = [
//         "Playstation 5",
//         "Nintendo Switch"
//     ];

//     //return view('saludo', ['nombre' => $nombre]);
//     //return view('saludo')->with(['nombre' => $nombre]);
//     return view('saludo', compact('nombre', 'html', 'script', 'consolas'));
// })->where('nombre', '[A-Za-z]+')->name('saludos');

Route::get('roles', function () {
  return \App\Role::with('user')->get();
});

Route::get('/saludos/{nombre?}', ['uses' => 'PagesController@saludo'])->where('nombre', '[A-Za-z]+')->name('saludos');

Route::resource('messages', 'MessagesController');
Route::resource('users', 'UsersController');

Route::get('login', 'Auth\LoginController@ShowLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

// Route::get('mensajes', 'MessagesController@index')->name('messages.index');
// Route::get('mensajes/create', 'MessagesController@create')->name('messages.create');
// Route::post('mensajes', 'MessagesController@store')->name('messages.store');
// Route::get('mensajes/{id}', 'MessagesController@show')->name('messages.show');
// Route::get('mensajes/{id}/edit', 'MessagesController@edit')->name('messages.edit');
// Route::put('mensajes/{id}', 'MessagesController@update')->name('messages.update');
// Route::delete('mensajes/{id}', 'MessagesController@destroy')->name('messages.destroy');
