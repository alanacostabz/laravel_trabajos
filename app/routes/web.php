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

// nombreapp.com = Route::get('/', function);
// nombreapp.com/contacto = Route::get('contacto', function);

// Route::get('/', function () {
//     return view('welcome');
// });

// Routes
// Route::get('/{nombre? }', function ($nombre = 'invitado') {
//     return "Saludos " . $nombre;
// });


// routes name
// Route::get('contactos', function () {
//     return "Sección de contactos";
// })->name('contactos');


// Route::get('/', function () {
//     echo "<a href='" . route('contactos') . "'>Contactos 1</a><br>";
//     echo "<a href='" . route('contactos') . "'>Contactos 2</a><br>";
//     echo "<a href='" . route('contactos') . "'>Contactos 3</a><br>";
//     echo "<a href='" . route('contactos') . "'>Contactos 4</a><br>";
//     echo "<a href='" . route('contactos') . "'>Contactos 5</a><br>";
// });


// Mostrar HTML con las vistas
// Route::get('/', function () {
//     $nombre = "Alan";
//     return view('home')->with('nombre', $nombre);
//     //return view('home', ['nombre' => $nombre]);
//     //return view('home', compact('nombre'));
// })->name('home');

//Route::view('/', 'home', ['nombre' => 'Alan'])->name('home'); // ejemplo politicas de privacidad, terminos y condiciones

// Route::view('/', 'home')->name('home');
// Route::view('/about', 'about')->name('about');
// Route::view('/contact', 'contact')->name('contact');
// Route::view('/portfolio', 'portfolio')->name('portfolio');


Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');

Route::resource('portafolio', 'ProjectController')
  ->names('projects')
  ->parameters(['portafolio' => 'project']);
//Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('portfolio');
// Route::get('/portafolio', 'ProjectController@index')->name('projects.index');
// Route::get('/portafolio/crear', 'ProjectController@create')->name('projects.create');
// Route::get('/portafolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
// Route::patch('/portafolio/{project}', 'ProjectController@update')->name('projects.update');
// Route::post('/portafolio', 'ProjectController@store')->name('projects.store');
// Route::get('/portafolio/{project}', 'ProjectController@show')->name('projects.show');
// Route::delete('/portafolio/{project}', 'ProjectController@Destroy')->name('projects.destroy');



//Route::resource('projects', 'ProjectController');
Route::post('contacto', 'MessageController@store')->name('messages.store');
Route::view('/contact', 'contact')->name('contact');

Auth::routes(['register' => false]);

//Route::get('/home', 'HomeController@index')->name('home');
