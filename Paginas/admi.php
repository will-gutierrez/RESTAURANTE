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
                <a href="agregar_usuario.php"><i class="fas fa-user-plus"></i> Usuarios </a>
                <a href="comida.php"><i class="fas fa-hamburger"></i> Comida </a>
                <a href="cerrar_sesion.php"><i class="fas fa-window-close"></i> Cerrar sesion</a>
            </nav>
        </div>
        </header>  
         <br><br><br><br><br>
         <center>
<h2>Hola 
<?php 
$conexion=mysqli_connect("localhost","root","","bga_hamburguesas");
$resultados = mysqli_query($conexion,"SELECT * FROM admi WHERE identificacion = '$ID'");
  while($consulta = mysqli_fetch_array($resultados))
  {
    $variable=$consulta['Nombre'];
    $variable2=$consulta['Apellido'];
  }
        echo $variable;
        echo " ";
        echo $variable2;
?>
             </h2>           
<table class="egt">
  <tr>

    <td><center>
      <?php
             
  $resultado = mysqli_query($conexion,"SELECT * FROM registro");
    echo "<h5>Registro</h5>";
  while($consulta = mysqli_fetch_array($resultado))
  {
    echo"<br>";
    echo"Usuario:";
    echo $consulta['Usuario']."<br>";
    echo"Mesa:";
    echo $consulta['mesa']."<br>";
    echo"Total:$";
    echo $consulta['total']."<br>";
    echo"Fecha:";
    echo $consulta['Fecha']."<br>-----------------------------------------------------------------";
  }
 

?> 
        
        </center></td>
 <td><center>
            <?php
             
  $resultado = mysqli_query($conexion,"SELECT * FROM usuarios");
    echo "<h5>Usuarios</h5>";
  while($consulta = mysqli_fetch_array($resultado))
  {
    echo"<br>";
    echo"Identificacion:";
    echo $consulta['identificacion']."<br>";
    echo"Nombre:";
    echo $consulta['Nombre']."<br>";
    echo"Clave:";
    echo $consulta['clave']."<br>-----------------------------------------------------------------";
  }
 

?>
     </center></td>

    </tr>
             </table>
         </center>
    </body>
</html>

