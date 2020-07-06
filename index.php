<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Panadería, ponqués, pastelería, pedidos especiales">
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light menu">

    <p class="logo"><a class="navbar-brand" href="www.miahpasteleria.com.co">Miah Pastelería</a></p>

  <!--<img src="imagenes/menu.png" class="menu-icon" alt="">-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto ml-auto nav-miah">
      <li class="nav-item active">
        <a class="nav-link" href="#">INICIO <span class="sr-only">(current)</span></a>
      </li>
     </ul> 
     <ul class="navbar-nav navbar-righ nav-miah">
       <li class="nav-item">
        <a class="nav-link" href="#sobre-nosotros">SOBRE NOSOTROS</a>
       </li>
     </ul>
      <ul class="navbar-nav navbar-right nav-miah">
        <li class="nav-item">
          <a class="nav-link" href="#">GALERÍA</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right nav-miah">
        <li class="nav-item">
          <a class="nav-link" href="#">TIPS</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACTO</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right nav-miah">
       <li class="nav-item active">
                     <a class="nav-link" href="carroMostrar.php" target="_blank">Carrito(<?php 
                   echo (empty($_SESSION['carrito']))?0:count(($_SESSION['carrito']));
                ?>)</a>
        </li>
      </ul>
    
  </div>
</nav>
<br>

 <div class="row title-total">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 title-mi">
      <h1>Miah pastelería</h1>
      <br>
      <br>
      <h3 class="h3mi">Más que pastelería amor</h3>
      <br>
      <br>
      <button type="button" class="btn btn-light btn-miah">Conocenos</button>
    </div>  
    <div class="col-xs-12 col-sm-16 col-md-6 col-lg-6">
         <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                 <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                 <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                 <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
             </ol>
         <div class="carousel-inner">
             <div class="carousel-item active">
                <img src="imagenes/slider1.jpg" class="d-block w-100  img-slider" alt="Galleta chips">

             </div>
             <div class="carousel-item">
                 <img src="imagenes/slider2.jpg" class="d-block w-100  img-slider" alt="Cupcakes">

             </div>
             <div class="carousel-item">
                 <img src="imagenes/slider3.jpg" class="d-block w-100 img-slider" alt="Alfajores">

                </div>
            </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
          </a>
      </div>


     </div>
</section>


  <br>

      <a id="whatsapp" href="https://wa.me/573015551936?texto=Deseo%20mas%20información%20de%20los%20productos" target="_blank"><img src="imagenes/Whatsapp_icon.png" alt="whatsapp miah"></a>
 <section id="sobre-nosotros">
  <div class="contenedor">
    <h3>Sobre Nosotros</h3>
    <hr>
    <div class="contenido">
      <div class="nosotros-image"><img src="imagenes/story.jpg" alt="pasteleria"></div>
      <div class="nosotros-text">
        <p>Somos apasionados por la buena pastelería y panadería, y el amor por este arte es lo que nos anima a hornear diariamente deliciosos productos para deleitar a nuestros comensales.</p>
      </div>
    </div>
    
  </div>
</section>


   <br>
   <br>
<section id="productos">
   <div class="container">
    <br>
    <?php if ($mensaje!="") {
     ?>
    <div class="alert alert-success">
      <?php echo $mensaje;?>
      <a href="carroMostrar.php" target="_blank" class="badge badge-success">Ver carrito</a>
    </div>
    <?php   }?>
    <div class="row">
          <?php
                $consulta=$pdo->prepare("SELECT * FROM productos");
                $consulta->execute();
                $listaProductos=$consulta->fetchAll(PDO::FETCH_ASSOC);
                #print_r($listaProductos);
           ?>
           <?php
                 foreach ($listaProductos as $producto) {         
              ?>
        <div class="col-xs-6 col-md-3 mt13">
           <div class="card">

            <img 
            title="<?php echo $producto['nombre'];?>" 
            alt="<?php echo $producto['nombre'];?>" 
            class="card-img-top pro-img" 
            src="productos/<?php echo $producto['imagen'];?>"  
            data-toggle="popover" data-content="<?php echo $producto['descripcion'];?>" 
            data-trigger="hover">
            <div class="card-body">
              <h5 class="card-title">$<?php echo $producto['precio'];?></h5>
              <p class="card-text"><?php echo $producto['nombre'];?></p>
              <form method="post">
                          <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], cod, key);?>">
                          <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], cod, key);?>">
                          <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], cod, key);?>">
                          <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, cod, key);?>">
                    

                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit" style="    border-radius: 13.25rem; padding: .375rem 0.75rem;">
                Agregar al carrito
              </button>
                        
                        </form>
            </div>
          </div> 
        </div>
         <?php
                  }
                ?> 
      </div>
   </div>             
 
</section> 

<section id="section-video">
  <div class ="contenedor">
    <h3>Cocinemos juntos</h3>

    <div class="contenido-video">
     <div class="tips-texto">
      <h2>¡¡Pan sin horno!!</h2>
      <p>Pan tipo árabe ideal para sandwich o hamburguesa. ¡Animate a prepararlo!</p>
    </div>
    <div class="video">
      <video id="video" src="imagenes/video.mp4"  controls=""></video>
    </div>
    </div>
    
  </div>
 </section>
      
<section id="contacto">
  <div class="contenedor">
    <div class="izquierda">
      <h2>Horario de atención</h2>
      <ul>
        <li>LUN - VIE</li>
        <li>08:00am - 12:00pm</li>
        <li>02:00pm - 06:00pm</li>
      </ul>
      <ul>
        <li>SAB</li>
        <li>08:30am - 4:30pm</li>
      </ul>
      <ul id="tercera" style="border-bottom: 0px ">
        <li>DOM</li>
        <li>Cerrado</li>
      </ul>
      <a href="#whatsapp">ESCRIBENOS</a>

      <h3 class="news" style="margin-top: 67px;">Conozca nuestros productos</h3>
      <p>Estamos interesados en realizar tus pedidos</p>
    </div>
    <div class="derecha">
      <h3>Escribenos</h3>
      <p>Escrbanos para saber más...</p>
      <a href="#contacto">CONTACTO</a>
      


    <form action="formulario.php" class="cliente" method="post" enctype="multipart/form-data" target="_blank">
        <input class="textos"  type="text" name="nombres" placeholder="Nombres" required="" title="nombres">
        <input class="textos"  type="text" name="apellidos" placeholder="Apellidos" title="apellidos">
        <input class="textos"  type="text" name="telefono" placeholder="Telefono" required="" title="telefono">
        <input class="emails" type="email" name="email" placeholder="Email" required="" title="email">
        <textarea class="textos"  name="mensaje" placeholder="Mensaje" title="mensaje"></textarea>
        <input class="submits" type="submit" value="CONTACTO">
      </form>


    </div>
  </div>
</section>

    <footer>
  <section id="socialmedia">
    <div class="contenedor">
      <div class="redes">
            <a href="https://www.facebook.com/miah.pasteleria/" target="_blank"><img src="imagenes/facebook.png" alt="facebook miah pasteleria"></a>
            <a href="https://www.instagram.com/miah.pasteleria/" target="_blank"><img src="imagenes/instagram.png" alt="instagram miah pasteleria"></a>
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