<?php


namespace App\Http\Controllers;

use App\Roles;
use \Auth;
use Illuminate\Http\Request;

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
    public function index()
    {
        if (Auth::user()->hasRole('Administrador')) {
            return view('home');
        } else if(Auth::user()->hasRole('Profesor')) {
            return view('inicio.agregarCurso');
        }else if(Auth::user()->hasRole('Alumno')) {
            return view('inicio.cursosPage');
        }
     //  return view('home');
    }

    public function usuario(){
        return view('user.usuarios');
    }

    public function search(Request $request)
    {
    $posts = User::where('name', 'LIKE', '%'.$request->search.'%')->get();
    return \response()->json($posts);
    }

}
