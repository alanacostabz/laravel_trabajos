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

use Illuminate\Support\Facades\Mail;

Route::resource('productos', 'ProductosController');

Route::get('/', function () {

    // $user = Auth::user();

    // if ($user->isAdmin()) {
    //     echo 'Eres usuario administrador';
    // } else {
    //     echo 'Eres estudiante';
    // }

    // if (Auth::check()) {
    //     return "Estás logeado";
    // } else {
    //     return "No estás logeado";
    // }




    # Enviar mails

    $datos =  [
        'titulo' => 'Que pex morro',
        'contenido' => 'Chambeando?'
    ];

    Mail::send("emails.test", $datos, function ($mensaje) {
        $mensaje->to('bryanbaez2504@gmail.com', 'Alan')->subject("Ojo, Mensaje importante");
    });


    return view('welcome');
});

// Route::get('/inicio', 'ProductosController@index');
// Route::get('/crear', 'ProductosController@create');
// Route::get('/actualizar', 'ProductosController@update');
// Route::get('/insertar', 'ProductosController@store');
// Route::get('/borrar', 'ProductosController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/admin/user/role', ['middleware' => 'role', function () {
//     return "Middleware role";
// }]);

Route::get('/admin', 'AdminController@index');
