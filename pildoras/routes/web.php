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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Article;
use App\Cliente;

Route::get('/', 'Micontroller@index');
Route::get('/create', 'Micontroller@create');
Route::get('/articles', 'Micontroller@store');
Route::get('/show', 'Micontroller@show');
Route::get('/contact', 'Micontroller@contact');
Route::get('/gallery', 'Micontroller@gallery');

#SQL RAW
// Route::get('/insert', function () {
//   DB::insert(
//     "INSERT INTO articles (nombre_articulo, precio, pais_origen,observaciones,seccion) VALUES (?,?,?,?,?)",
//     ["JARRON", 15.2, 'JAPON', 'GANGA', 'CERAMICA']
//   );
// });

// Route::get('/select', function () {
//   $results = DB::select("SELECT * FROM articles WHERE ID=?", [1]);

//   foreach ($results as $article) {
//     return $article->nombre_articulo;
//   }
// });

// Route::get('/update', function () {
//   DB::update("UPDATE articles SET seccion='DECORACION' WHERE ID =?", [1]);
// });

// Route::get('/delete', function () {
//   DB::delete("DELETE FROM articles WHERE ID =?", [1]);
// });

#ELOQUENT
Route::get('select', function () {
  // $articles = Article::all();

  // foreach ($articles as $article) {
  //   echo $article->nombre_articulo . '<br>';
  // }

  //$articles = Article::where('pais_origen', 'USA')->max('precio');

  //$articles = Article::where('id', '5')->get();

  $articles = Article::withTrashed()
    ->where('id', 5)
    ->get();

  return $articles;
});

Route::get('insert', function () {
  $articles = new Article;

  $articles->nombre_articulo = "DEMON'S SOULS";
  $articles->precio = 59.99;
  $articles->pais_origen = "JAPAN";
  $articles->observaciones = "RPG";
  $articles->seccion = "VIDEOGAMES";
  $articles->save();
});

Route::get('update', function () {
  // $articles = Article::find(6);

  // $articles->nombre_articulo = "DEMON'S SOULS";
  // $articles->precio = 69.99;
  // $articles->pais_origen = "JAPAN";
  // $articles->observaciones = "RPG";
  // $articles->seccion = "VIDEOGAMES";
  // $articles->save();

  //Article::where("seccion", "VIDEOGAMES")->update(["seccion" => "PLAYSTATION"]);
  Article::where("pais_origen", "GERMANY")
    ->where("seccion", "SPORTS")
    ->update(["precio" => 49.99]);
});

Route::get('delete', function () {
  $article = Article::find(4);
  //$article::where('seccion', 'sports')->delete();
  $article->delete();
});

Route::get('inserts', function () {
  Article::create([
    'nombre_articulo' => 'PLAYSTATION 5',
    'precio' => 499.99,
    'pais_origen' => 'JAPAN',
    'observaciones' => 'PLAY HAS NO LIMITS',
    'seccion' => 'VIDEOGAMES'
  ]);
});

Route::get('softdelete', function () {
  Article::find(5)->delete();
});

Route::get('forcedelete', function () {
  $articles = Article::withTrashed()
    ->where('id', 5)
    ->forceDelete();
});


Route::get('cliente/{id}/article', function ($id) {
  return Cliente::find($id)->article;
});

Route::get('article/{id}/cliente', function ($id) {
  return Article::find($id)->cliente->nombre;
});

Route::get('articles', function () {
  $articles = Cliente::find(1)->articles->where('pais_origen', 'JAPAN');

  foreach ($articles as $article) {
    echo $article->nombre_articulo . "</br>";
  }
});

Route::get('cliente/{id}/profile', function ($id) {
  $cliente = Cliente::find($id);

  foreach ($cliente->profiles as $profile) {
    return $profile->nombre;
  }
});

Route::get("ratings", function () {
  //$cliente = Cliente::find(1);
  $article = Article::find(7);

  foreach ($article->ratings as $rating) {
    return $rating->rating;
  }
});
