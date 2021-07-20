@extends('layouts.plantilla')

@section('contenido')
<div class="container col-md-5">
    <h3>Registro de Usuarios</h3>
    @if($resp ?? '' =="si")
    <p>Usuario registrado correctamente</p>
    @endif
    <h1>Seccion de administrador</h1>
    <form action="{{route('admin.store')}}" method="POST"">
    @csrf
<div class=" mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="name" name="name" class="form-control">
</div>

<div class=" mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" name="email" class="form-control">
</div>

<div class=" mb-3">
    <label for="password" class="form-label">Password:</label>
    <input type="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-primary"> Guardar</button>

</form>

</div>

@stop