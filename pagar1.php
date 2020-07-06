<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta title="Miah Pastelería y Panadería | miahpasteleria.com.co">
  <meta name="description" content="Disfruta de productos deliciosos,de excelente calidad y frescos, elaboramos cupcakes, tortas, mesas dulces,fresas decoradas y mucho más">
  <meta name="Miah Pastelería">
  <title>Miah Patelería</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="imagenes/cupcake.png">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display|Poppins&display|Rubik&display|Open+Sans&display|Anton&display|Raleway&display|Lobster&display|Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<br>
<body>
<?php
if ($_POST) {
	$total=0;
	$SID=session_id();
	$correo=$_POST['email'];
	foreach($_SESSION['carrito'] as $indice=>$producto){
      
      $total=$total+($producto['precio']*$producto['cantidad']);
	}

	$consulta=$pdo->prepare("INSERT INTO ventas (id, claveTransaccion, paypalDatos,fecha,correo,total,status) VALUES (NULL,:claveTransaccion, '', NOW(),:correo, :total, 'pendiente')");
    
    $consulta->bindParam(":claveTransaccion",$SID);
    $consulta->bindParam(":correo",$correo);
    $consulta->bindParam(":total",$total);
	$consulta->execute();
	$idventa=$pdo->lastInsertID();

   
   foreach($_SESSION['carrito'] as $indice=>$producto){

      $consulta=$pdo->prepare("INSERT INTO detalleventa (id,idVenta,idProducto,precioUnitario,cantidad,descargado) VALUES (NULL,:idVenta,:idProducto,:precioUnitario,:cantidad, '0')");


    $consulta->bindParam(":idVenta",$idventa);
    $consulta->bindParam(":idProducto",$producto['id']);
    $consulta->bindParam(":precioUnitario",$producto['precio']);
    $consulta->bindParam(":cantidad",$producto['cantidad']);
	$consulta->execute();

   }


	#echo "<h3>".$total."</h3>";
}

?>

<div class="jumbotron text-center">
	<h1 class="display-4">¡Paso Final !</h1>
	<hr class="my-4">
	<p class="lead"> Estas a punto de pagar la cantidad de: 
       <h4>$<?php echo number_format($total,2); ?></h4>
       <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
        <input name="merchantId"    type="hidden"  value="508029"><!--859571-->
        <input name="accountId"     type="hidden"  value="512321" >
        <input name="description"   type="hidden"  value="Miah Pastelería"  >
        <input name="referenceCode" type="hidden"  value="pagosrhr" >
        <!-- <input name="referenceCode" type="hidden"  value="<?php echo $idventa;?>" > -->
        <input name="amount"        type="hidden"  value="20000">
        <!-- <input name="amount"        type="hidden"  value="<?php echo $total;?>"> -->
        <input name="tax"           type="hidden"  value="0"  >
        <input name="taxReturnBase" type="hidden"  value="0" >
        <input name="currency"      type="hidden"  value="COP" >
        <input name="signature"     type="hidden"  value="99bb751f65d92a100b0dd6dc143a445b">
        <input name="test"          type="hidden"  value="1" >
        <input name="buyerEmail"    type="hidden"  value="quinterobernldav@gmail.com">
        <input name="responseUrl"    type="hidden"  value="http://localhost/miah/respuesta.php" >
        <input name="confirmationUrl"    type="hidden"  value="http://localhost/miah/respuesta.php" >
        <input name="Submit"        type="submit"  value="Enviar" >
      </form>
	</p>
	<p>Los productos se despacharán tan pronto se procese el pago<br>
      <strong>(Para aclaraciones : miahpasteleria@gmail.com)</strong>
	</p>


</div>


<br>
  <footer>
  <section id="socialmedia">
    <div class="contenedor">
      <div class="redes">
            <a href="https://www.facebook.com/miah.pasteleria/" target="_blank"><img src="imagenes/facebook.png"></a>
            <a href="https://www.instagram.com/miah.pasteleria/" target="_blank"><img src="imagenes/instagram.png"></a>
            <a href="link de linkedd" target="_blank"><img src="imagenes/linkedin.png"></a>
      </div>
      <div class="parrafo">
        <p>2020 MIAH  PASTELERÍA | Empresa de alimentos Colombia. Todos los derechos reservados</p>
      </div>
    </div>
  </section>
</footer>

    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/d7f8911c59.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script >
    $(document).ready(function(){

  $(window).scroll(function(){
    scroll = $(window).scrollTop();

      if (scroll > 100) {
        $('.menu').css({"background":"#fff"});
        $('.menu').css({"position":"fixed"});
        $('.menu').css({"width":"100%"});
        $('.menu').css({"top":"0"});
        $('.menu a').css({"color":"#000"});
        $('.menu a').css({"text-decoration":"none"});
        $('.logo').css({"color":"#000"});
        $('.menu').css({"box-shadow":"rgba(0,0,0,0.22) 6px 1px 1px"});
        $('.menu').css({"z-index":"100"});
        $('.menu ul').css({"list-style":"none"});

      }else{
        $('.menu').css({"position":"relative"});
        $('.menu').css({"background":"#fff"});
        $('.menu').css({"width":"100%"});
        $('.menu').css({"top":"0"});
        $('.menu').css({"box-shadow":"0 0 0"});
        $('.menu').css({"z-index":"100"});
        $('.menu a').css({"color":"#000"});
        $('.logo').css({"color":"#000"});
      }
  })  

 $('.menu-icon').click(function(){
    $('header nav').slideToggle();
 })
              
      })
</script>

<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})  
</script>
</body>
</html>
    

   
