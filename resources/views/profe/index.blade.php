@extends('layouts.plantilla')
@section('contenido')

<div class="container col-md-7">

    <div class="card">
        <div class="row" >
            <form method="GET" action="">

                <input type="text" name="buscar">
                <button class="btn btn-success">Buscar</button>
            </form>

        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th></th>
            </tr>

            </thead>
            @foreach ($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th> <a href="{{route('docente.edit',$user->id )}}" class="btn btn-primary">Asignar</a></th>
                </tr>
            @endforeach

        </table>

    </div>

</div>

{{$users->links()}}

@stop
