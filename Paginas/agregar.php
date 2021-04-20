<?php
    $identificacion=$_POST['identificacion'];
    $nombre=$_POST['nombre'];
    $clave=$_POST['clave'];
$conexion=mysqli_connect("localhost","root","","bga_hamburguesas");
    mysqli_query($conexion, "INSERT INTO usuarios 
        (identificacion,Nombre,clave) 
        values 
        ('$identificacion','$nombre','$clave')");
       header("location:agregar_usuarios.php");
?>
