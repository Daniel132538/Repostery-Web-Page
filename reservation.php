<!DOCTYPE html>
<!--
	Resto by GetTemplates.co
	URL: https://gettemplates.co
-->
<?php session_start();?>

<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="imagenes/titulo.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quark reposteria</title>
    <meta name="description" content="Resto">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Josefin+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>
<body data-spy="scroll" data-target="#navbar">
	<div id="side-nav" class="sidenav">
	<a href="javascript:void(0)" id="side-nav-close">&times;</a>
	
	<div class="sidenav-content">
		<p>
			Kuncen WB1, Wirobrajan 10010, DIY
		</p>
		<p>
			<span class="fs-16 primary-color">(+68) 120034509</span>
		</p>
		<p>info@yourdomain.com</p>
	</div>
</div>	<div id="side-search" class="sidenav">
	<a href="javascript:void(0)" id="side-search-close">&times;</a>
	<div class="sidenav-content">
		<form action="">

			<div class="input-group md-form form-sm form-2 pl-0">
			  <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
			  <div class="input-group-append">
			    <button class="input-group-text red lighten-3" id="basic-text1">
			    	<i class="fas fa-search text-grey" aria-hidden="true"></i>
			    </button>
			  </div>
			</div>

		</form>
	</div>
	
 	
</div>	<div id="canvas-overlay"></div>
	<div class="boxed-page">
		<nav id="navbar-header" class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand navbar-brand-center d-flex align-items-center p-0 only-mobile" href="/">
            <img src="imagenes/titulo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex justify-content-between">
            <li class="nav-item only-desktop">
                    <a class="nav-link" id="side-nav-open" href="#">
                        <span class="lnr lnr-menu"></span>
                    </a>
                </li>
                <div class="d-flex flex-lg-row flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=home&id=1">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=home&id=2">About</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php?accion=home&id=4" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Novedades
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="index.php?accion=home&id=4">Canutillos</a>
                          <a class="dropdown-item" href="index.php?accion=home&id=4">Flan de Manzana</a>
                        </div>
                    </li>
                </div>
            </ul>
            
            <a class="navbar-brand navbar-brand-center d-flex align-items-center only-desktop" href="#">
                <img src="imagenes/titulo.png"   alt="">
            </a>
            <ul class="navbar-nav d-flex justify-content-between">
                <div class="d-flex flex-lg-row flex-column">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?accion=home&id=3">Menu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="reservation.php">Pedir</a>
                    </li>
                    <?php
                        include "modelo.php";
                        $con = conexion();
                
                        if (isset($_SESSION["idusuario"])){
                            $idusuario = $_SESSION["idusuario"];
                            $consulta = "select * from final_usuario where ID = '$idusuario'";
                            $resultado = $con->query($consulta);
                            if (mysqli_num_rows($resultado) == 1){
                                $datos = $resultado->fetch_assoc();
                                $nombre = $datos['Nombre'];
                                if ($datos['IDRol'] == 1){
                                  $cuerpo = 
                                  '<li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hola '.$nombre.'
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
                                          <a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
                                      </div>
                                  </li>';
                                  echo $cuerpo;
                                } else if ($datos['IDRol'] == 2){
                                  $cuerpo = 
                                  '<li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hola '.$nombre.'
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                          <a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
                                          <a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
                                          <a class="dropdown-item" href="menuAdmin.html">Gestionar base de datos</a>
                                      </div>
                                  </li>';
                                  echo $cuerpo;
                                }
                                
                            }else{
                                $cuerpo = 
                                '<li class="nav-item dropdown">
                                    <a class="nav-link" href="login.html">Iniciar Sesion</a>
                                </li>';
                                echo $cuerpo;
                            }
                        } else{
                            $cuerpo = 
                            '<li class="nav-item dropdown">
                                <a class="nav-link" href="login.html">Iniciar Sesion</a>
                            </li>';
                            echo $cuerpo;
                        }
                
                        
                    ?>
                    
                </div>
                <li class="nav-item">
                    <a id="side-search-open" class="nav-link" href="#">
                        <span class="lnr lnr-magnifier"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>		<!-- Reservation Section -->

<?php 

error_reporting(0);

$carrito_mio=$_SESSION['carrito'];
$_SESSION['carrito']=$carrito_mio;
$totalcantidad = 0;
$total_cantidad = 0;
// contamos nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
      if($carrito_mio[$i]!=NULL){ 
        $total_cantidad = $carrito_mio['cantidad'];
        $total_cantidad ++ ;
        $totalcantidad += $total_cantidad;
      }
    }
  }
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Mi carrito</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" <?php 
          $con = conexion();
                
          if (isset($_SESSION["idusuario"])){
              $idusuario = $_SESSION["idusuario"];
              $consulta = "select * from final_usuario where ID = '$idusuario'";
              $resultado = $con->query($consulta);
              if (mysqli_num_rows($resultado) == 1){
                  $datos = $resultado->fetch_assoc();
                  $cuerpo = 'data-bs-target="#modal_cart"';
                  echo $cuerpo;
              }else{
                  $cuerpo = 'data-bs-target="#modal_nocart"';
                  echo $cuerpo;
              }
          } else{
              $cuerpo = 'data-bs-target="#modal_nocart"';
              echo $cuerpo;
          }?> style="color: red;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END NAVBAR -->



<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){
						
            ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span   style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> €</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (EUR)</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}}}
							echo $total; ?> €</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
        <a type="button" class="btn btn-tertiary" href="index.php?accion=pedido&id=2">Realizar pedido</a>
      </div>
    </div>
  </div>
</div>

<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_nocart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Debes registrarte para usar el carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL CARRITO -->





<!-- ARTICULOS -->
<!--<div class="container mt-5">
<div class="row" style="justify-content: center;">
##fila##
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carrito.php">
        <input name="precio" type="hidden" id="precio" value="##precio##" />
        <input name="titulo" type="hidden" id="titulo" value="##nombre##" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="imagenes/##imagen##" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">##nombre##</h5>
                        <p class="card-text">Descripción - Precio ##precio## €</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>
##fila##-->
<div class="container mt-5">
<div class="row" style="justify-content: center;">

<?php

    $con = conexion();
        
    if (isset($_SESSION["idusuario"])){
        $idusuario = $_SESSION["idusuario"];
        $consulta = "select * from final_usuario where ID = '$idusuario'";
        $resultado = $con->query($consulta);
        if (mysqli_num_rows($resultado) == 1){
            $datos = $resultado->fetch_assoc();
            $cuerpo = 'carrito.php';
        }else{
            $cuerpo = ' ';
        }
    } else{
        $cuerpo = ' ';
    }

    $resultado = mdatosproductos();
			
    /*<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carrito.php">
        <input name="precio" type="hidden" id="precio" value="20" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 2" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/art.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Descripción - Precio 20€</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>*/ 

	$trozos = 
'<div class=card m-4" style="width: 18rem;">
    <form id="formulario" name="formulario" method="post" action='.$cuerpo.'>
    <input name="precio" type="hidden" id="precio" value="##precio##" />
    <input name="titulo" type="hidden" id="titulo" value="##nombre##" />
    <img src="imagenes/##imagen##" class="card-img-top" alt="...">
            <div class="card-body">
                    <h5 class="card-title">##nombre##</h5>
                    <p class="card-text">Descripción - Precio ##precio## €</p>
                    <p class="card-text">Cantidad: </p><input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                    <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
            </div>
    </form>
</div>';

	$cuerpo = "";
	while ($datos = $resultado->fetch_assoc()) {
		$aux = $trozos;
		$aux = str_replace("##idproducto##", $datos["ID"], $aux);
		$aux = str_replace("##nombre##", $datos["Nombre"], $aux);
		$aux = str_replace("##precio##", $datos["Precio"], $aux);
		//$aux = str_replace("##imagen##", $datos["imagen"], $aux);
		if (strlen($datos["imagen"]) > 0 ) {
			$aux = str_replace("##imagen##", $datos["imagen"], $aux);	
		} else {
			$aux = str_replace("##imagen##", "nophoto.jpg", $aux);
		}
		$cuerpo .= $aux;
	}
	echo $cuerpo;	
?>
</div>
</div>
<!--<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carrito.php">
        <input name="precio" type="hidden" id="precio" value="10" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="imagenes/art.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción - Precio 10€</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carrito.php">
        <input name="precio" type="hidden" id="precio" value="20" />
        <input name="titulo" type="hidden" id="titulo" value="Brownie" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="imagenes/brownie.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Brownie</h5>
                        <p class="card-text">Descripción - Precio 20€</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>-->
</div>
</div>
<!-- END ARTICULOS -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>

<!-- End of Reservation Section -->		<footer class="mastfoot pb-5 bg-white section-padding pb-0">
    <div class="inner container">
         <div class="row">
         	<div class="col-lg-4">
         		<div class="footer-widget pr-lg-5 pr-0">
         			<img src="imagenes/titulo.png" class="img-fluid footer-logo mb-3" alt="">
	         		<p>Contacta con nosotros para cualquier duda que tengas:<br> 620 172 678 / 948 16 11 18</p>
	         		<nav class="nav nav-mastfoot justify-content-start">
		                <a class="nav-link" href="#">
		                	<i class="fab fa-facebook-f"></i>
		                </a>
		                <a class="nav-link" href="#">
		                	<i class="fab fa-twitter"></i>
		                </a>
		                <a class="nav-link" href="#">
		                	<i class="fab fa-instagram"></i>
		                </a>
		            </nav>
         		</div>
         		
         	</div>
         	<div class="col-lg-4">
                <div class="footer-widget px-lg-5 px-0">
                    <h4>Horas laborales</h4>
                    <ul class="list-unstyled open-hours">
                       <li class="d-flex justify-content-between"><span>Lunes</span><span>9:00 - 24:00</span></li>
                       <li class="d-flex justify-content-between"><span>Martes</span><span>9:00 - 24:00</span></li>
                       <li class="d-flex justify-content-between"><span>Miercoles</span><span>9:00 - 24:00</span></li>
                       <li class="d-flex justify-content-between"><span>Jueves</span><span>9:00 - 24:00</span></li>
                       <li class="d-flex justify-content-between"><span>Viernes</span><span>9:00 - 02:00</span></li>
                       <li class="d-flex justify-content-between"><span>Sabado</span><span>9:00 - 02:00</span></li>
                       <li class="d-flex justify-content-between"><span>Domingo</span><span> Closed</span></li>
                     </ul>
                </div>
                
            </div>

         	<!--<div class="col-lg-4">
         		<div class="footer-widget pl-lg-5 pl-0">
         			<h4>Newsletter</h4>
	         		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	         		<form id="newsletter">
						<div class="form-group">
							<input type="email" class="form-control" id="emailNewsletter" aria-describedby="emailNewsletter" placeholder="Enter email">
						</div>
						<button type="submit" class="btn btn-primary w-100">Submit</button>
					</form>
         		</div>-->
         		
         	</div>
         	<div class="col-md-12 d-flex align-items-center">
         		<p class="mx-auto text-center mb-0">Diseñado por Quark Reposteria</p>
         	</div>
            
        </div>
    </div>
</footer>	</div>
	
</div>
</body>
</html>
