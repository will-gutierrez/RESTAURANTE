<?php

    session_start();
    $identificacion=$_POST['identificacion'];
    $clave=$_POST['clave'];
    $conexion=mysqli_connect("localhost","root","","bga_hamburguesas");
    $_SESSION['identificacion'] = $identificacion;

    //conexion a la base de datos
    $consulta="SELECT * FROM usuarios WHERE identificacion='$identificacion' and clave='$clave'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_num_rows($resultado);
    if ($filas>0){
        header("location:ordenes.php");
    
    }


    $consulta2="SELECT * FROM admi WHERE identificacion='$identificacion' and clave='$clave'";

    $resultado2=mysqli_query($conexion,$consulta2);

    $filas2=mysqli_num_rows($resultado2);
    if ($filas2>0){
        header("location:admi.php");
        
    }/* 
    else{
        header("location:error_inicio.php");
    }*/
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>