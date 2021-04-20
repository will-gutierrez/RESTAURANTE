<?php
    $tipo_comida=$_POST['tipo'];
    $precio=$_POST['precio'];
    date_default_timezone_set('America/Bogota');
    $fecha_actual=date("y-m-d h:i:s ");
$conexion=mysqli_connect("localhost","root","","bga_hamburguesas");
    mysqli_query($conexion, "INSERT INTO pedidos 
        (comida,precio,fecha) 
        values 
        ('$tipo_comida','$precio','$fecha_actual')");
       header("location:comida.php");
?>