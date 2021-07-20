<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Primera ruta
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //paginate sirve para mostrar cuantos datos
        //por pagina quieres mostrar
        $data = DB::table('users')->paginate(6);

        //dd data sirve para ver si esta entrando
        //dd($data);

        return view('admin.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return view('admin.index')->with('resp', 'si');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Edicios de usuarios
        //Recopilacioon de ususarios
        $data = DB::table('users')->where('id', '=', $id)->first();
        $cuatri=DB::table('materias')
            ->join ('alumnoMateria','alumnoMateria.idSemestre','=','materias.id')
            ->where('alumnoMateria.idAlumno','=',$data->id)->get();

        if(isset($_GET['cuatri']) && $_GET['cuatri'] != 0){

            //dump($_GET['cuatri']);
            $materias = DB::table('materias')->where('cuatri','=',$_GET['cuatri'])->get();
        }else{
            $materias=[0];

        }

        if(isset($_GET['cuatri']) && isset($_GET['save']))
        {
            dump($materias,$data,$cuatri);

            $resp= $cuatri->where('cuatri',$_GET['cuatri'])->first();
            dump ($resp);

            if(!$resp){
                dump("si guardo");

                foreach($materias as $m){
                    DB::table('alumnoMateria')
                        ->insert([
                            'idAlumno'=>$data ->id,
                            'idSemestre'=>$m->id,
                        ]);
                }
            }
        }else{
            dump("no guardo");
        }


        return view('admin.edit',
            ['data'=>$data,
                'materias'=>$materias,
                'matCursadas'=>$cuatri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
