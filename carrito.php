<?php
session_start();

$mensaje="";

if (isset($_POST['btnAccion'])) {
	   
	   switch ($_POST['btnAccion']) {
	   	case 'Agregar':
	   		if (is_numeric(openssl_decrypt($_POST['id'], cod, key) )) {
	   			$id=openssl_decrypt($_POST['id'], cod, key);
	   			$mensaje.="OK id correcto ".$id."<br>";
	   		}else{
	   			$mensaje.="Ups id incorrecto".$id;
	            }
	   		if (is_string(openssl_decrypt($_POST['nombre'], cod, key) )) {
	   			$nombre=openssl_decrypt($_POST['nombre'], cod, key);
	   			$mensaje.="Producto " .$nombre."<br>";
	   		}else{
	   			$mensaje.="Ups algo pasa con el nombre"; break;
	   		}
	   		   if (is_numeric(openssl_decrypt($_POST['precio'], cod, key) )) {
	   			  $precio=openssl_decrypt($_POST['precio'], cod, key);
	   			  $mensaje.="Precio " .$precio."<br>"; 
	   		    }else{
	   			  $mensaje.="Ups algo pasa con el precio";break;
	   		    }
	   		   if (is_numeric(openssl_decrypt($_POST['cantidad'], cod, key) )) {
	   			   $cantidad=openssl_decrypt($_POST['cantidad'], cod, key);
	   			   $mensaje.="Articulos " .$cantidad."<br>";
	   		    }else{
	   			   $mensaje.="Ups algo pasa con la cantidad"; break;
	   		      }

	    if (!isset($_SESSION['carrito'])) {
	    	
	    	$producto=array(
	    		'id' =>$id , 
	    		'nombre' =>$nombre , 
	    		'precio' =>$precio , 
	    		'cantidad' =>$cantidad 
	    	);
	    	$_SESSION['carrito'][0]=$producto;
	    }else{
	    	$numeroProductos=count($_SESSION['carrito']);
	    	$producto=array(
	    		'id' =>$id , 
	    		'nombre' =>$nombre , 
	    		'precio' =>$precio , 
	    		'cantidad' =>$cantidad  
	    	);
	    	$_SESSION['carrito'][$numeroProductos]=$producto;
	    }

	    #$mensaje=print_r($_SESSION,true);
	    $mensaje="Producto agregado al carrito.";
	   	break;
	   	case "Eliminar":
            if (is_numeric(openssl_decrypt($_POST['id'], cod, key))) {
            	$id = openssl_decrypt($_POST['id'], cod, key);
            	foreach ($_SESSION['carrito'] as $indice => $producto) {
            		if ($producto['id']==$id) {
            			unset($_SESSION['carrito'][$indice]);
            			echo "<script>alert('Producto eliminado...');</script>";break;
            		}
            	}
            }else{
            	echo "<script>alert('Error al eliminar producto actualiza la web...');</script>";break;
            }
	   	break;
	   	
	   	default:
	   		# code...
	   		break;
	   }


	}


?>