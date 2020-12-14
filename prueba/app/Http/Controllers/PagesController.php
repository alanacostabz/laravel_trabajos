<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    //protected $requested;

    // function __construct(Request $request)
    // {
    //     $this->request = $request;
    // }

    public function __construct()
    {
        $this->middleware('example', ['only', 'home']);
    }

    public function home()
    {
        return view('home');
        // return response('Contenido de la respuesta', 201)
        //     ->header('X-TOKEN', 'secret')
        //     ->header('X-TOKEN-2', 'secret-2')
        //     ->header('X-COOKIE', 'cookie'); // las cookies son automaticamente encriptadas
    }

    // public function contact()
    // {
    //     return view('contactos');
    // }

    public function saludo($nombre = "invitado")
    {
        $html = "<h2>Contenido html</h2>"; // ingresado por formulario
        $script = "<script>alert('Problema XSS - Cross Site Scriptiong')</script>";

        // loop
        $consolas = [
            "Playstation 5",
            "Nintendo Switch"
        ];


        return view('saludo', compact('nombre', 'html', 'script', 'consolas'));
    }

    public function mensajes(CreateMessageRequest $request)
    {
        // $this->validate($request, [
        //     'nombre' => 'required',
        //     'email' => 'required|email',
        //     'mensaje' => 'required|min:5'
        // ]);

        $data = $request->all(); // procesar los datos del formulario - devuelve un array

        // redirección
        // return response()->json(['data' => $data], 202)
        //     ->header('TOKEN', 'secret');

        // return redirect()
        //     ->route('contactos')
        //     ->with('info', 'Tu mensaje ha sido enviado correctamente :)');

        return back()
            ->with('info', 'Tu mensaje ha sido enviado correctamente :)');
    }
}
