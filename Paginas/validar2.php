<?php
session_start();
$ID = $_SESSION['identificacion'];
error_reporting(0);
$varsesion = $_SESSION['identificacion'];
if ($varsesion == null || $varsesion=''){
    echo'Usted no tiene autorizacion';
    die();
}
echo $varsesion;
?>
<!DOCTYPE html>
<html>
<head>
    <link  rel="stylesheet" href="../CSS/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/v4-shims.css">
</head>
     <body style="background-color:;">        
    <header class="header2">
        <div class="wrapper">
            <div class="logo">
            <img src="../Imagenes/LOGO_BGA_HMB.png" width="130" height="100">BGA Hamburguesas
            </div>
            <nav>
                <a href="ordenes.php"><i class="fas fa-undo-alt"></i> Volver</a>
                <a href="cerrar_sesion.php"><i class="fas fa-window-close"></i> Cerrar sesion</a>
            </nav>
        </div>
        </header>  
         <br><br><br><br><br>
<?php
    $MESA=$_POST['owner'];
    $PEDIDO=$_POST['owner1'];
    $CANTIDAD=$_POST['menu'];
echo $MESA;
echo $PEDIDO;
echo $CANTIDAD;
$conexion=mysqli_connect("localhost","root","","bga_hamburguesas");
$resultados = mysqli_query($conexion,"SELECT * FROM usuarios WHERE identificacion = '$ID'");
  while($consulta = mysqli_fetch_array($resultados))
  {
    $variable=$consulta['Nombre'];
  }
        echo $variable;

$resultados2 = mysqli_query($conexion,"SELECT * FROM pedidos WHERE comida = '$PEDIDO'");
  while($consulta2 = mysqli_fetch_array($resultados2))
  {
    $variable2=$consulta2['precio'];
  }
?>
         <br>
su orden fue 
         <br>
<?php
$total=$variable2 * $CANTIDAD;
echo $total;
?>
<?php
    date_default_timezone_set('America/Bogota');
    $fecha_actual=date("y-m-d h:i:s ");
    mysqli_query($conexion, "INSERT INTO registro 
        (Usuario,mesa,total,Fecha) 
        values 
        ('$variable','$MESA','$total','$fecha_actual')");
       header("location:ordenes.php");
    
?>
