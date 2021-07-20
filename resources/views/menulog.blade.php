@extends('layouts.plantilla')
@section('contenido')
<div class="row justify-content-center">
    <div class="col-6">
        <h1>Menu para logeados</h1>
        <ul>
            @foreach($materias as $m)
            <li> {{$m->materia}} - {{$m->cuatri}}</li>
            @endforeach
        </ul>
    </div>
</div>
@stop