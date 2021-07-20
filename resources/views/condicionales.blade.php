
@if($log)
@include('index')
@else
<h4>Entro al menu usuario normal</h4>
@endif

<h3> Ejemplo de Ciclo </h3>

<ol>
@for ($i=0; $i<=3; $i++)
<li>El valor de la i es: {{$i}}</li>
@endfor
</ol>

<?php $var=0;?>
<h3>Ejemplo de Ciclo While</h3>
@while ($var <= 3)
El valor de var es: {{$var}}<br>
<?php $var++;?>
@endwhile

<h3>Ejemplo de Dowhilee</h3>
<?php
do {
    if ($i < 5) {
        echo "i no es lo suficientemente grande";
        break;
    }
    $i *= $factor;
    if ($i < $minimum_limit) {
        break;
    }
   echo "i está bien";
} while (0);
?>

<h3>Ejemplo de Switchh</h3>
<?php
switch ($i) {
    case "manzana":
        echo "i es una manzana";
        break;
    case "barra":
        echo "i es una barra";
        break;
    case "pastel":
        echo "i es un pastel";
        break;
}
?>