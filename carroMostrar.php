<?php
include 'global/config.php';
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
<body>
	<br>
	<header class="header1">
		<div class="menu">
			<div class="contenedor">
				<p class="logo"><a href="index.php">Miah Pastelería</a></p>
				<img src="imagenes/menu.png" class="menu-icon" alt="">
				<nav>
					<ul>
						<li><a href="index.php">INICIO</a></li>
						<li><a href="index.php">SOBRE NOSOTROS</a></li>
						<li><a href="index.php">GALERÍA</a></li>
						<li><a href="index.php">TIPS</a></li>
						<li><a href="index.php">CONTACTO</a></li>
						<li class="nav-item active">
   	 			           <a class="nav-link" href="carroMostrar.php" >Carrito(<?php 
                   echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito']));
                ?>)</a>
   	 		            </li>
					</ul>
				</nav>
			</div>
		</div>

	    </div>
	</header>

<div class="container">
<br>

<h3>Lista del carrito</h3>
<?php if (!empty($_SESSION['carrito'])) {
  ?>
<table table table-light table-bordered>
	<tbody>
		<tr>
			<th width="40%" height="50px" style="border: 1px solid #ABB2B9;">Descripción</th>
			<th width="15%" height="50px" style="border: 1px solid #ABB2B9;" class="text-center">cantidad</th>
			<th width="20%" height="50px" style="border: 1px solid #ABB2B9;" class="text-center">Precio</th>
			<th width="20%" height="50px" style="border: 1px solid #ABB2B9;" class="text-center">Total</th>
			<th width="5%"  height="50px" style="border: 1px solid #ABB2B9;"  class="text-center">--</th>
		</tr>
		<?php $total=0; ?>
		<?php foreach($_SESSION['carrito'] as $indice=>$producto){
           
			?>
        <tr>
        	<td width="40%" style="border: 1px solid #D5D8DC;"><?php echo $producto['nombre']?></td>
			<td width="15%" style="border: 1px solid #D5D8DC;" class="text-center"><?php echo $producto['cantidad']?></td>
			<td width="20%" style="border: 1px solid #D5D8DC;" class="text-center"><?php echo $producto['precio']?></td>
			<td width="20%" style="border: 1px solid #D5D8DC;" class="text-center"><?php echo number_format($producto['precio']*$producto['cantidad'],2) ;?></td>
			<td width="5%" style="border: 1px solid #D5D8DC;" class="text-center">

				<form action="" method="post">
					<input type="hidden" name="id" id="id" value="<?php echo  openssl_encrypt($producto['id'], cod, key);?>">
					<button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
				</form>
				
			</td>
        </tr>
        <?php $total=$total+$producto['precio']*$producto['cantidad']; ?>
        <?php } ?>
        <tr>
        	<td colspan="3" style="border: 1px solid #D5D8DC;" align="right"><h3>Total</h3></td>
        	<td align="right" style="border: 1px solid #D5D8DC;" class="text-center"><h3>$<?php echo number_format($total,2);?></h3></td>
        	<td></td>
        </tr>
        <tr>
        	<td colspan="5">

        	  <form action="pagar.php" method="post">
        	  	<div class=" alert alert-success">
        	  	  <div class="form-group">
        			<label for="my-input">Correo de contacto:</label>
        			<input type="email" name="email" name="correo" class="form-control" placeholder="Ingresa tu correo" required="">
        		  </div>
        		  <small id="emailHelp" class="form-text text-muted">
        	  		Los productos se enviarán a este correo..
        	  	 </small>
        	  	</div>
        	  	<button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Proceder a pagar >></button>
        	  	
        	  </form>
        		
        	</td>
        </tr>
	</tbody>
</table>


<?php	} else{ ?>
<div class="alert alert-success">
	No hay productos en el carrito..
</div>
<?php }?>

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