<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        # Agregando info
        //$request->session()->put(['Bryan' => 'admin']);
        //session(['María' => 'Estudiante']);

        #Borrando info especifica
        //$request->session()->forget('María');

        #Borrando toda la info
        // $request->session()->flush();

        #Para guardar informacion de la sesion anterior y la nueva
        //$request->session()->flash('Entrada7', 'Éxito7');

        #Para guardar mas informacion que la sesion anterior y la nueva
        //$request->session()->reflash();

        #Mantener información especifica guardada de la sesion
        //$request->session()->keep(['Bryan', 'admin']);

        # Para cambiar el SESSION ID cada vez que se carge la página
        # Así evitamos ataques de vulnerablidad SESSION FIXATION
        $request->session()->regenerate();

        return $request->session()->all();

        // $user = Auth::user();
        // return view('home', compact('user'));
    }
}
