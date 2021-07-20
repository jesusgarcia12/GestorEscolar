@extends('layouts.plantilla')

@section('contenido')

<div class="container col-md-7" ></div>
<h3>El usuario a editar es {{$data->name}}</h3>

<form method="GET" action="">

<select class="form-select" name="cuatri" aria-label="Default select example">
    <option selected value="0">Selecciona un cuatrimestre</option>
    <option value="5">5to cuatrimestre</option>
    <option value="8">8vo cuatrimestre</option>
  </select>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>


 <div class="card">

<div class="card-body">
<table class="table table-striped">

    <thead>
    <tr>
    <th>Materias</th>
    <th>Cuatrimestre</th>
    
    </tr>

    </thead>

    <tbody>

     @if ($materias[0])
    @foreach ($materias as $m)
        <tr>
            <td>{{$m->materia}}</td>
            <td>{{$m->cuatri}}</td>
        </tr>
    @endforeach
    
    @endif
    </tbody>

    </table>

    </div>

    </div>


<hr>

    <div class="card">

        <div class="card-body">
        <table class="table table-striped">
        
            <thead>
            <tr>
            <th>Materias Cursadas</th>
            <th>Cuatrimestre</th>
           
            </tr>
        
            </thead>
        
            <tbody>
        
             @if ($matCursadas->first)
            @foreach ($matCursadas as $m)
                <tr>
                    <td>{{$m->materia}}</td>
                    <td>{{$m->cuatri}}</td>
                </tr>
            @endforeach
            
            @endif
            </tbody>
        
            </table>
        
            </div>
        
            </div>

            

     <hr>
    <form method="GET" action="">
    @if(isset($_GET['cuatri']))

    <input type="hidden" name="cuatri" value={{$_GET['cuatri']}} >
    @endif
        <input type="hidden" name="save" value="si">
        <button type="submit" class="btn btn-success" > Guardar </button>

    </form>


@endsection