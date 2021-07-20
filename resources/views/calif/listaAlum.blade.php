<h1>{{$titulo}}</h1>
<p>
    <ul>
        @foreach($alumno as $alum)
        <li>{{$alum}}</li>
        @endforeach
</ul>
</p>

{{--COMENTARIO--}}

<?=isset($var) ? $var:'No existe';?>
<br>
{{$var ?? 'No existe'}}