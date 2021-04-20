<?php    
    $Nombre=$_POST['owner'];
echo $Nombre;
$conexion=mysqli_connect("localhost","root","","bga_hamburguesas");
$sql = mysqli_query($conexion, "DELETE FROM pedidos WHERE comida='$Nombre'"); 
       header("location:comida.php");
?>