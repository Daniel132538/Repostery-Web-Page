<?php
    function vmostrarmenu ($resultado) {
		$cuerpo = file_get_contents("menuAnonimo.html");
		if ($resultado == '-1'){
			$cuerpo = str_replace("##iniciarsesion##", 
			'<li class="nav-item dropdown">
				<a class="nav-link" href="login.html">Iniciar Sesion</a>
			</li>', $cuerpo);
		} else{
			if (mysqli_num_rows($resultado) == 1){
				$datos = $resultado->fetch_assoc();
				$nombre = $datos['Nombre'];
				if ($datos['IDRol'] == '1'){
					$cuerpo = str_replace("##iniciarsesion##", 
					'<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hola '.$nombre.'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
							<a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
						</div>
					</li>'
					, $cuerpo);
				} else if ($datos['IDRol'] == '2'){
					$cuerpo = str_replace("##iniciarsesion##", 
					'<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hola '.$nombre.'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
							<a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
							<a class="dropdown-item" href="menuAdmin.html">Gestionar base de datos</a>
						</div>
					</li>'
					, $cuerpo);
				}
			}
		}
		echo $cuerpo;
	}

	function vmostrarmenusalirsesion () {
		$cuerpo = file_get_contents("menuAnonimo.html");
		$cuerpo = str_replace("##iniciarsesion##", 
		'<li class="nav-item dropdown">
		<a class="nav-link" href="login.html">Iniciar Sesion</a>
		</li>', $cuerpo);
		//session_start();
		session_destroy();
		echo $cuerpo;
	}

	function vmostrarmenueditarperfil($resultado) {
		$cuerpo = file_get_contents("menuAnonimo.html");
		if (mysqli_num_rows($resultado) == 1){
			$datos = $resultado->fetch_assoc();
			$nombre = $datos['Nombre'];
			$cuerpo = str_replace("##iniciarsesion##", 
			'<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				   Hola '.$nombre.'
				 </a>
				 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
					<a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
				 </div>
			</li>'
			, $cuerpo);
		}
		echo $cuerpo;
	}

	function vcogermenueditarperfil($resultado) {
		$cuerpo = file_get_contents("menuAnonimo.html");
		if (mysqli_num_rows($resultado) == 1){
			$datos = $resultado->fetch_assoc();
			$nombre = $datos['Nombre'];
			$cuerpo = str_replace("##iniciarsesion##", 
			'<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				   Hola '.$nombre.'
				 </a>
				 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
					<a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
				 </div>
			</li>'
			, $cuerpo);
		}
		return $cuerpo;
	}

	function vmostrarpagina($resultado, $cuerpo){
		if ($resultado == '-1'){
			$cuerpo = str_replace("##iniciarsesion##", 
			'<li class="nav-item dropdown">
				<a class="nav-link" href="login.html">Iniciar Sesion</a>
			</li>', $cuerpo);
		} else{
			if (mysqli_num_rows($resultado) == 1){
				$datos = $resultado->fetch_assoc();
				$nombre = $datos['Nombre'];
				if ($datos['IDRol'] == 1){
					$cuerpo = str_replace("##iniciarsesion##", 
					'<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hola '.$nombre.'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
							<a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
						</div>
					</li>'
					, $cuerpo);
				}
				else if ($datos['IDRol'] == 2){
					$cuerpo = str_replace("##iniciarsesion##", 
					'<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hola '.$nombre.'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
							<a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
							<a class="dropdown-item" href="menuAdmin.html">Gestionar base de datos</a>
						</div>
					</li>'
					, $cuerpo);
				}
			}
		}
		echo $cuerpo;
	}

	function vmostrarabout($resultado){
		$cuerpo = file_get_contents("about.html");
		vmostrarpagina($resultado, $cuerpo);
	}

	function vmostrarnovedades($resultado){
		$cuerpo = file_get_contents("novedades.html");
		vmostrarpagina($resultado, $cuerpo);
	}

	function vmostrarmenucarta($resultado){
		$cuerpo = file_get_contents("menu.html");
		vmostrarpagina($resultado, $cuerpo);
	}

    function vmostraraltausuario(){
        echo file_get_contents("altaUsuario.html");
    }

	function vmostraraltaproducto(){
        echo file_get_contents("altaProducto.html");
    }

    function mostrarmensaje($titulo, $mensaje) {
		$cadena = file_get_contents("mensaje.html");
		$cadena = str_replace("##titulo##", $titulo, $cadena);
		$cadena = str_replace("##mensaje##", $mensaje, $cadena);
		echo $cadena;
	}

	function mostrarpago($titulo, $mensaje) {
		$cadena = file_get_contents("pago.html");
		$cadena = str_replace("##titulo##", $titulo, $cadena);
		$cadena = str_replace("##mensaje##", $mensaje, $cadena);
		echo $cadena;
	}


    function vmostrarresultadoaltausuario($resultado){
        if ($resultado == -1){
            mostrarmensaje("Error mostrar resultado usuario", "Error rellena todas las casillas");
        }else if ($resultado == -2){
            mostrarmensaje("Error mostrar resultado usuario",  "Error el nombre solo puede llevar letras y espacios");
        }else if ($resultado == -3){
            mostrarmensaje("Error mostrar resultado usuario",  "Error el apellido solo puede llevar letras y espacios");
        }else if ($resultado == -4){
            mostrarmensaje("Error mostrar resultado usuario",  "Error el apellido solo puede llevar letras y espacios");
        }else if ($resultado == -5){
            mostrarmensaje("Error mostrar resultado usuario",  "El numero de teléfono solo pueden ser dígitos");
        }else if ($resultado == -6){
            mostrarmensaje("Error mostrar resultado usuario",  "El léxico del email es incorrecto.");
        }else if ($resultado == -7){
            mostrarmensaje("Error mostrar resultado usuario",  "La contraseña no es la misma en ambas casillas.");
        }else if ($resultado == -8){
            mostrarmensaje("Error mostrar resultado usuario",  "Este usuario ya tiene una cuenta registrada.");
        }else if ($resultado == -9){
            mostrarmensaje("Error mostrar resultado usuario",  "No se ha podido realizar el registro correctamente."); 
        }else if ($resultado == 1){
            mostrarmensaje("Error mostrar resultado usuario",  "Se ha podido realizar el registro correctamente.");
        }
    }

	function vmostrarresultadoaltaproducto($resultado){
        if ($resultado == -1){
            mostrarmensaje("Error mostrar resultado usuario", "Error rellena todas las casillas");
        }else if ($resultado == -2){
            mostrarmensaje("Error mostrar resultado usuario",  "Error el nombre solo puede llevar letras y espacios");
        }else if ($resultado == -3){
            mostrarmensaje("Error mostrar resultado usuario",  "El precio deben ser dígitos");
        }else if ($resultado == -4){
            mostrarmensaje("Error mostrar resultado usuario",  "Error el apellido solo puede llevar letras y espacios");
        }else if ($resultado == -5){
            mostrarmensaje("Error mostrar resultado usuario",  "Este producto ya está registrada.");
        }else if ($resultado == -6){
            mostrarmensaje("Error mostrar resultado usuario",  "El fichero no se ha subido bien"); 
        }else if ($resultado == 1){
            mostrarmensaje("Error mostrar resultado usuario",  "Se ha podido realizar el registro correctamente.");
        }
    }

    function  vmostrarlistadousuarios($resultado, $tipolistado) {
		if (!is_object($resultado)) {
			mostrarmensaje("Listado personas", "No hemos podido coger la información de personas.");
		} else {
			if ($tipolistado == "listado") {
				$cadena = file_get_contents("listadoUsuarios.html");
			} else {
				$cadena = file_get_contents("listadoUsuariosbym.html");
			}
			
			$trozos = explode("##fila##", $cadena);

			$cuerpo = "";
			while ($datos = $resultado->fetch_assoc()) {
				$aux = $trozos[1];
				$aux = str_replace("##idusuario##", $datos["ID"], $aux);
				$aux = str_replace("##nombre##", $datos["Nombre"], $aux);
				$aux = str_replace("##apellido1##", $datos["Apellido1"], $aux);
				$aux = str_replace("##apellido2##", $datos["Apellido2"], $aux);
				$aux = str_replace("##contraseña##", $datos["Contraseña"], $aux);
				$aux = str_replace("##email##", $datos["Email"], $aux);
                $aux = str_replace("##telefono##", $datos["Telefono"], $aux);
                $aux = str_replace("##direccion##", $datos["Direccion"], $aux);
				$cuerpo .= $aux;
			}

			echo $trozos[0] . $cuerpo . $trozos[2];
		}
    }       
    function vmostrarmodificarusuario($resultado, $datosrol) {
		if (!is_object($resultado)) {
			mostrarmensaje("Modificar persona", "Se ha producido un error.");
		} else {
			if (!is_object($datosrol)) {
				mostrarmensaje("Modificar persona", "Se ha producido un error.");
			} else {
				$cadena = file_get_contents("modificarUsuario.html");

				$datos = $resultado->fetch_assoc();
				$cadena = str_replace("##idusuario##", $datos["ID"], $cadena);
				$cadena = str_replace("##nombre##", $datos["Nombre"], $cadena);
				$cadena = str_replace("##apellido1##", $datos["Apellido1"], $cadena);
				$cadena = str_replace("##apellido2##", $datos["Apellido2"], $cadena);
				$cadena = str_replace("##contraseña##", $datos["Contraseña"], $cadena);
				$cadena = str_replace("##email##", $datos["Email"], $cadena);
				$cadena = str_replace("##telefono##", $datos["Telefono"], $cadena);
				$cadena = str_replace("##direccion##", $datos["Direccion"], $cadena);
				$idrol = $datos["IDRol"];

				//Vamos a montar los roles

				$trozos = explode("##fila##", $cadena);
				$cuerpo = "";
				while ($datos = $datosrol->fetch_assoc()) {
					$aux = $trozos[1];
					$aux = str_replace("##idrol##", $datos["ID"], $aux);
					$aux = str_replace("##rol##", $datos["Rol"], $aux);
					if ($idrol == $datos["ID"]) {
						$aux = str_replace("##seleccionado##", "selected", $aux);						
					} else {
						$aux = str_replace("##seleccionado##", "", $aux);
					}

					$cuerpo .= $aux;
				}

				$cadena = $trozos[0] . $cuerpo . $trozos[2];
				
				echo $cadena;			
			}	
		}
	}

    function vmostrarresultadomodificar ($resultado) {
		if ($resultado == 1) {
			mostrarmensaje("Modificación de persona", "Se ha modificado la persona correctamente");
		} else {
			mostrarmensaje("Modificación de persona", "No se ha podido modificar la persona.");
		}
	}

	function vmostrarresultadomodificarproducto ($resultado) {
		if ($resultado == 1) {
			mostrarmensaje("Modificación de producto", "Se ha modificado el producto correctamente");
		} else {
			mostrarmensaje("Modificación de producto", "No se ha podido modificar el producto.");
		}
	}

    function vmostrareliminarusuario($resultado) {
		if (!is_object($resultado)) {
			mostrarmensaje("Modificar persona", "Se ha producido un error.");
		} else {
			$cadena = file_get_contents("eliminarUsuario.html");

			$datos = $resultado->fetch_assoc();
			$cadena = str_replace("##idusuario##", $datos["ID"], $cadena);
			$cadena = str_replace("##nombre##", $datos["Nombre"], $cadena);
			$cadena = str_replace("##apellido1##", $datos["Apellido1"], $cadena);
			$cadena = str_replace("##apellido2##", $datos["Apellido2"], $cadena);
			$cadena = str_replace("##contraseña##", $datos["Contraseña"], $cadena);
			$cadena = str_replace("##email##", $datos["Email"], $cadena);
            $cadena = str_replace("##telefono##", $datos["Telefono"], $cadena);
            $cadena = str_replace("##direccion##", $datos["Direccion"], $cadena);

			echo $cadena;				
		}
	}

    function vmostrarresultadoeliminarusuario ($resultado) {
		if ($resultado == 1) {
			mostrarmensaje("Eliminación de persona", "Se ha eliminado la persona correctamente");
		} else {
			mostrarmensaje("Eliminación de persona", "No se ha podido eliminar la persona.");
		}
	}

	function  vmostrarlistadoproductos($resultado, $tipolistado) {
		if (!is_object($resultado)) {
			mostrarmensaje("Listado personas", "No hemos podido coger la información de personas.");
		} else {
			if ($tipolistado == "listado") {
				$cadena = file_get_contents("listadoProducto.html");
			} else {
				$cadena = file_get_contents("listadoProductobym.html");
			}
			
			$trozos = explode("##fila##", $cadena);

			$cuerpo = "";
			while ($datos = $resultado->fetch_assoc()) {
				$aux = $trozos[1];
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

			echo $trozos[0] . $cuerpo . $trozos[2];
		}
    }    

	function  vmostrarlistadocarritos($cuerpo) {
		echo $cuerpo;
    }   


	function vmostrarmodificarproducto($resultado){
		if (!is_object($resultado)) {
			mostrarmensaje("Modificar persona", "Se ha producido un error.");
		} else {
			$cadena = file_get_contents("modificarProducto.html");

			$datos = $resultado->fetch_assoc();
			$cadena = str_replace("##idproducto##", $datos["ID"], $cadena);
			$cadena = str_replace("##nombre##", $datos["Nombre"], $cadena);
			$cadena = str_replace("##precio##", $datos["Precio"], $cadena);
			$cadena = str_replace("##imagen##", $datos["imagen"], $cadena);
				
			echo $cadena;			
		}
	}

	function vvalidareliminarcarrito($resultado){
		if ($resultado == 1){
			mostrarmensaje("Carrito eliminado correctamente", "El carrito ha sido eliminado correctamente");
		} else{
			mostrarmensaje("Ha ocurrido un error al eliminar al carrito", "Ha ocurrido un error al eliminar al carrito");
		}
	}

	function vmostrareliminarproducto($resultado) {
		if (!is_object($resultado)) {
			mostrarmensaje("Modificar persona", "Se ha producido un error.");
		} else {
			$cadena = file_get_contents("eliminarProducto.html");

			$datos = $resultado->fetch_assoc();
			$cadena = str_replace("##idproducto##", $datos["ID"], $cadena);
			$cadena = str_replace("##nombre##", $datos["Nombre"], $cadena);
			$cadena = str_replace("##precio##", $datos["Precio"], $cadena);
			$cadena = str_replace("##imagen##", $datos["imagen"], $cadena);

			echo $cadena;				
		}
	}

	function vmostrarresultadoeliminarproducto ($resultado) {
		if ($resultado == 1) {
			mostrarmensaje("Eliminación de producto", "Se ha eliminado el producto correctamente");
		} else {
			mostrarmensaje("Eliminación de producto", "No se ha podido eliminar el producto.");
		}
	}
    
	function vmostrarproductoscarrito($resultado){
        $con = conexion();
		if (!is_object($resultado)) {
			mostrarmensaje("Modificar persona", "Se ha producido un error.");
		} else {
			$cadena = file_get_contents("reservation.php");
			
			/*$trozos = explode("##fila##", $cadena);

			$cuerpo = "";
			while ($datos = $resultado->fetch_assoc()) {
				$aux = $trozos[1];
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


			echo $trozos[0] . $cuerpo . $trozos[2];	*/
			echo $cadena;			
		}
    }

	function vañadircarrito(){
		//aqui empieza el carrito
		//session_start();
		if(isset($_SESSION['carrito'])){
			$carrito_mio=$_SESSION['carrito'];
			if(isset($_POST['titulo'])){
				$titulo=$_POST['titulo'];
				$precio=$_POST['precio'];
				$cantidad=$_POST['cantidad'];
				$num=0;
				$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad);
			}
		}else{
			$titulo=$_POST['titulo'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$carrito_mio[]=array("titulo"=>$titulo,"precio"=>$precio,"cantidad"=>$cantidad);	
		}
		

		$_SESSION['carrito']=$carrito_mio;

		//aqui termina el carrito
		header("Location: ".$_SERVER['HTTP_REFERER']."");

		echo file_get_contents("reservation.php");

	}

function vmostrarhome(){
	file_get_contents("homeAdmin.html");
}

function vmostrarresultadologin($resultado){
	//session_start();
    if (mysqli_num_rows($resultado) == 1){
			$datos = $resultado->fetch_assoc();
			$_SESSION['idusuario'] = $datos["ID"];
			$_SESSION['email'] =  $datos["Email"];
			$_SESSION['nombre'] =  $datos["Nombre"];
			$_SESSION['apellido1'] =  $datos["Apellido1"];
			$_SESSION['apellido2'] =  $datos["Apellido2"];
			$_SESSION['telefono'] =  $datos["Telefono"];
			$_SESSION['direccion'] =  $datos["Direccion"];
			$nombre = $datos["Nombre"];
			
			if ($datos['IDRol'] == '1'){
				$cuerpo = file_get_contents("menuAnonimo.html");
				$cuerpo = str_replace("##iniciarsesion##", 
				'<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Hola '.$nombre.'
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    	<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
                        <a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
                     </div>
                </li>'
				, $cuerpo);
			} else if ($datos['IDRol'] == '2'){
				$cuerpo = file_get_contents("menuAnonimo.html");
				$cuerpo = str_replace("##iniciarsesion##", 
				'<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Hola '.$nombre.'
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    	<a class="dropdown-item" href="index.php?accion=editar&id=1">Editar Perfil</a>
                        <a class="dropdown-item" href="index.php?accion=menu&id=2">Cerrar sesión</a>
						<a class="dropdown-item" href="menuAdmin.html">Gestionar base de datos</a>
                     </div>
                </li>'
				, $cuerpo);
			}else{
				$cuerpo = file_get_contents("loginError.html");
				$cuerpo = str_replace("##mensaje##", "El email o contraseña son incorrectos", $cuerpo);
			}
		} else{
			$cuerpo = file_get_contents("loginError.html");
			$cuerpo = str_replace("##mensaje##", "El email o contraseña son incorrectos", $cuerpo);
		}
		echo $cuerpo;
	}

	function vmostrareditarperfil($resultado){
		if (mysqli_num_rows($resultado) == 1){
			$datos = $resultado->fetch_assoc();
			$cuerpo = file_get_contents("editarperfilusuario.html");
			$cuerpo = str_replace("##idusuario##", $datos['ID'], $cuerpo);
			$cuerpo = str_replace("##nombre##", $datos['Nombre'], $cuerpo);
			$cuerpo = str_replace("##apellido1##", $datos['Apellido1'], $cuerpo);
			$cuerpo = str_replace("##apellido2##", $datos['Apellido2'], $cuerpo);
			$cuerpo = str_replace("##telefono##", $datos['Telefono'], $cuerpo);
			$cuerpo = str_replace("##password##", $datos['Contraseña'], $cuerpo);
			$cuerpo = str_replace("##password2##", $datos['Contraseña'], $cuerpo);
			$cuerpo = str_replace("##direccion##", $datos['Direccion'], $cuerpo);
			$cuerpo = str_replace("##email##", $datos['Email'], $cuerpo);
			$cuerpo = str_replace("##mensaje##", "", $cuerpo);
			echo $cuerpo;
		}	
	}

	function vcogereditarperfil($resultado){
		if (mysqli_num_rows($resultado) == 1){
			$datos = $resultado->fetch_assoc();
			$cuerpo = file_get_contents("editarperfilusuario.html");
			$cuerpo = str_replace("##idusuario##", $datos['ID'], $cuerpo);
			$cuerpo = str_replace("##nombre##", $datos['Nombre'], $cuerpo);
			$cuerpo = str_replace("##apellido1##", $datos['Apellido1'], $cuerpo);
			$cuerpo = str_replace("##apellido2##", $datos['Apellido2'], $cuerpo);
			$cuerpo = str_replace("##telefono##", $datos['Telefono'], $cuerpo);
			$cuerpo = str_replace("##password##", $datos['Contraseña'], $cuerpo);
			$cuerpo = str_replace("##password2##", $datos['Contraseña'], $cuerpo);
			$cuerpo = str_replace("##direccion##", $datos['Direccion'], $cuerpo);
			$cuerpo = str_replace("##email##", $datos['Email'], $cuerpo);
			return $cuerpo;
		}	
	}

	function vvalidareditarperfil($resultado, $cuerpo, $cuerpo2){
		if ($resultado == 1){
			echo $cuerpo2;
		} else{
			if ($resultado == -1){
				$cuerpo = str_replace("##mensaje##", "Error rellena todas las casillas", $cuerpo);
			}else if ($resultado == -2){
				$cuerpo = str_replace("##mensaje##",  "Error el nombre solo puede llevar letras y espacios", $cuerpo);
			}else if ($resultado == -3){
				$cuerpo = str_replace("##mensaje##",  "Error el apellido solo puede llevar letras y espacios", $cuerpo);
			}else if ($resultado == -4){
				$cuerpo = str_replace("##mensaje##",  "Error el apellido solo puede llevar letras y espacios", $cuerpo);
			}else if ($resultado == -5){
				$cuerpo = str_replace("##mensaje##",  "El numero de teléfono solo pueden ser dígitos", $cuerpo);	
			}else if ($resultado == -6){
				$cuerpo = str_replace("##mensaje##",  "El léxico del email es incorrecto.", $cuerpo);
			}else if ($resultado == -7){
				$cuerpo = str_replace("##mensaje##",  "La contraseña no es la misma en ambas casillas.", $cuerpo);
			}else if ($resultado == -8){
				$cuerpo = str_replace("##mensaje##",  "Se ha producido un error a la hora de modificar.", $cuerpo);
			}
			echo $cuerpo;
		}
	}
	function vmostrarregistro(){
		echo file_get_contents("register.html");
	}
	function vmostrarresultadoregistro(){
		mresultadoregistro();
	}

	function vvalidarpedido($resultado){
		if ($resultado == 1){
			mostrarpago("Realizar pedido", "Pedido realizado correctamente. Le llamaremos en cuanto este listo!!! "); 
		} else{
			mostrarpago("Realizar pedido", "Error al realizar pedido.");
		}
	}

	function vgenerarcsv(){
		$con = mysqli_connect("dbserver", "grupo44", "soh5eeMeiz", "db_grupo44");

		$consulta = "select ID, Email, Nombre, Fecha_alta from final_usuario";
		$resultado = $con->query($consulta);
		
		$data = array();

		$fp = fopen("usuarios.csv","w"); 
		
		if($fp == false) { 
			die("No se ha podido crear el archivo."); 
		}
		$header = "ID;Email;Nombre;Fecha_alta\n" ;
		fwrite($fp, $header);
		while( $fila = $resultado->fetch_assoc()){
		//foreach ($resultado->fetch_assoc() as $line){
			$id = $fila['ID'];
			$Email = $fila['Email'];
			$nombre = $fila['Nombre'];
			$Fecha_alta = $fila['Fecha_alta'];

			$file = "'$id';'$Email';'$nombre';'$Fecha_alta'\n";
			fwrite($fp, $file);
		}
		fclose($fp);
	}

	function vmostrarcodigoverificacion($cuerpo){
		echo $cuerpo;
	}

	function vvalidarcodigoverificacion($resultado){
		return $resultado;
	}
	function vmostrarcomentarios($resultado){
			if (is_object($resultado)){
				$cadena = file_get_contents("comentarios.html");
				$trozos = explode("##fila##", $cadena);
				$cuerpo = "";
				while ($datos = $resultado->fetch_assoc()){
					$aux = $trozos[1];
					$aux = str_replace("##nombre##",  $datos['Nombre']. " " .$datos['Apellido1']. " ".$datos['Apellido2'],  $aux);
					$aux = str_replace("##fecha##",  $datos['Fecha_comentario'],  $aux);
					$aux = str_replace("##comentario##",  $datos['Comentario'],  $aux);
					$cuerpo .= $aux;
				}
				echo $trozos[0] . $cuerpo . $trozos[2];
			} else{
				echo "Error al mostrar comentarios";
			}

	}
	function vañadirComentario($textarea){
        if (isset($_SESSION['idusuario'])){
            $con = conexion();
            $idusuario = $_SESSION['idusuario'];
            $consulta = "insert into final_comentario (Comentario, IDUsuario,Fecha_comentario) values ('$textarea', '$idusuario', CURRENT_TIMESTAMP)";
            if ($con->query($consulta)){
                return 1;
            } else{
				print_r("adios");
                return -1;
            }
        } else{
            return -1;
        }
            
    }

?>