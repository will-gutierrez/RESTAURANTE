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
                  <a href="admi.php"><i class="fas fa-undo-alt"></i> Volver</a>

                <a href="cerrar_sesion.php"><i class="fas fa-window-close"></i> Cerrar sesion</a>
            </nav>
        </div>
        </header>  
         <br><br><br><br><br>
                       
<table class="egt">
  <tr>

    <td><center>
      <?php
$conexion=mysqli_connect("localhost","root","","bga_hamburguesas");   
  $resultado = mysqli_query($conexion,"SELECT * FROM pedidos");
    echo "<h5>Menu</h5>";
  while($consulta = mysqli_fetch_array($resultado))
  {
    echo"<br>";
    echo"ID:";
    echo $consulta['id']."<br>";
    echo"Tipo de comida:";
    echo $consulta['comida']."<br>";
    echo"Fecha:";
    echo $consulta['fecha']."<br>";
    echo"Precio:$";
    echo $consulta['precio']."<br>-----------------------------------------------------------------";
  }
 

?> 
        
        </center></td>
    </tr></table>
      <table class="egt">
  <tr>

 <td><center>
     <h2>¿ Que comida deseas agregar
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
        ?</h2>

<form action="agregar_comida.php" method="post">
  <p>Tipo de comida: <input type="text" name="tipo" ></p>
  <p>Precio: <input type="number" name="precio"></p>
    <input type="submit" value="Agregar">
    <input type="reset" value="Borrar">
</form>
        
        </center></td>
             <table class="egt">
  <tr>

    <td><center>
        <form action="eliminar_comida.php" method="post">
        <h2>¿ Que comida deseas eliminar <?php echo $variable;?> <?php echo $variable2;?> ?</h2><br>
                     <select name="owner"> 
<?php 
$conexion=mysqli_connect("localhost","root","","bga_hamburguesas");

$sql = mysqli_query($conexion, "SELECT * FROM pedidos"); 

while ($row = $sql->fetch_assoc()){ 

?> 
<option ><?php echo $row['comida']; ?></option> 

<?php 
// close while loop 
} 
?>
        </select>
            <br><br>
    <input type="submit" value="Eliminar">
        </form>
       
      