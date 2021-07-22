<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class profesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['buscar'])){
            
            $users= DB::table('users')
            ->select('id','name','email')
            ->where('name','LIKE','%'.trim($_GET['buscar']).'%')
            ->orWhere('id','LIKE','%'.trim($_GET['buscar']).'%')
            ->orWhere('email','LIKE','%'.trim($_GET['buscar']).'%')
            ->paginate(7);

        }else{
            $users = DB::table('users')->paginate(7);
        }
        
        //dump($users);
        return view('profe.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    {     //mostrar la materia a cursar
        $materias= DB::table('materias')->get();
        //dump($materias);

        //crear un join para verificacion de las materias que se le asignen al profesor
        $profeMateria = DB::table('materias')
        ->join('profeMateria','profeMateria.idmateria','=','materias.id')
        ->where('profeMateria.idUser','=',$id)->get();

        //dump($materias,$profeMateria);

        //validamos que exista la variable guardar y que tenga el valor de Si
        //validar el arreglo idMat que no venga solo

        if(isset($_GET['guardar']) && $_GET["guardar"]=="si" && !empty($_GET['idMat'])){
            foreach( $_GET['idMat'] as $val){
                
                $resp = $profeMateria->where('idMateria',$val)->first();
                if (!$resp){

                    if(!empty($_GET['idMat'])){
                        DB::table('profeMateria')->insert([
                            'idUser'=>$id,
                            'idMateria'=>$val
                        ]);
    
                }
                }

        }
        }
        if (isset($_GET['eliminar']) && $_GET['eliminar']=="eliminar" && !empty($_GET['idMat'])){

           if (!empty($_GET['idMat'])){
            foreach($_GET['idMat'] as $val){
                DB::table('profeMateria')
                ->where('id','=',$val)
                ->delete();
            }

           }
        }
           

        return view('profe.edit',compact('materias','profeMateria'));

        
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
