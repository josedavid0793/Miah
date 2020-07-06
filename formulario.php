<?php


#include ("database.php");
include ("conexion.php");
$server   ="localhost";
$username = "root";
$password = "";
$db       = "miah_pasteleria";

$con =  mysqli_connect($server,$username,$password,$db);
if (!$con){
	die("Connection failed:". mysqli_connect_error());
}
echo "<br>";

$nombre_usuario =$_POST['nombres'];
$apellido_usuario =$_POST['apellidos'];
$telefono =$_POST['telefono'];
$email_usuario =$_POST['email'];
$mensaje_usuario =$_POST['mensaje'];

//Setencia SQL

$query = "INSERT INTO mensaje_web (nombres,apellidos,telefono,email,mensaje)VALUES ('$nombre_usuario','$apellido_usuario','$telefono','$email_usuario','$mensaje_usuario')";


/*$query =("INSERT INTO pedidos_mensaje  (nombres,apellidos,no_identificacion,email,mensaje) VALUES ('$nombre_usuario','$apellido_usuario','$cedula_usuario','$email_usuario','$mensaje_usuario')");*/

//Ejecución setencia SQL
$resultado = $con->query($query);
#$resultado = mysqli_query($conexion,$query);

//Verificación de la ejecución
if(!$resultado){
  	echo "No se guardaron datos<br><a href='index.php'>Volver</a>".$query."<br>". mysqli_error($con);
     mysqli_close($con);
  }else{
  	echo "Datos Guardados correctamente<br><a href='index.php'>Volver</a>";
  	mysqli_close($con);
    
  }

 
?>