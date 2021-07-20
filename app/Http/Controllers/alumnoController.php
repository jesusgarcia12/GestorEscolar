<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class alumnoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function datos(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);


        $credentials = $request->only('email', 'password');
        //dump($credentials);
        //Esto verifica que me este devolviendo algo de la base de datos
        //Select * from materias;
        //$materias = DB::table('materias')->get();
        //dump($materias);
        //die();



        $usr = $request->only('email');
        $res = DB::table('users')->where('email', '=', $usr)->first();
        session(['id' => $res->id]);

        if (Auth::attempt($credentials)) {
            return redirect(route('menulog') . "?nom=$res->name");
            //return "se realizo la conexion";
        } else {
            return redirect(route('login'));
            //return "valio verga mijo";
        }
    }

    public function menulog(Request $request)
    {
        //Select * from user;
        //$materias = DB::table('materias')->get();
        //Recupera el nombre de la url
        //$nom = $request->input('nom');
        //Recupera el id del nombre
        $id = session('id');
        $res = DB::table('users')->where('id', '=', $id)->first();


        $materias = DB::table('materias')
            ->join('alumnoMateria', 'alumnoMateria.idSemestre', '=', 'materias.id')
            ->where('alumnoMateria.idAlumno', '=', $res->id)->get();


        return view('menulog', [
            'materias' => $materias,
            'nom' => $res->name
        ]);
    }


    public function layout()
    {
        return view('layouts.plantilla');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
