<?php
	include "modelo.php";
	include "vista.php";

	activar_sesion();

	//Coger variables
	if (isset($_GET['accion'])) {
		$accion = $_GET['accion'];	
	} else {
		if (isset($_POST["accion"])) {
			$accion = $_POST['accion'];
		} else {
			$accion = "menu";
		}
	}
	if (isset($_GET['id'])) {
		$id = $_GET['id'];	
	} else {
		if (isset($_POST["id"])) {
			$id = $_POST['id'];
		} else {
			$id = "1";
		}
	}


    if ($accion == "usuario"){
        switch ($id) {
			case '1':
				// Mostrar alta
				vmostraraltausuario();
				break;
			case '2':
				//Validar alta
				vmostrarresultadoaltausuario(mvalidaraltausuario());
				break;
			case '3':
				//Listado
				vmostrarlistadousuarios(mdatosusuarios(), "listado");
				break;
			case '4':
				//Listado
				vmostrarlistadousuarios(mdatosusuarios(), " ");
				break;
			case '5':
				//Mostrar Modificar
				vmostrarmodificarusuario(mdatosusuario(), mdatosrol());
				break;
			case '6':
				//Modificar usuario
				vmostrarresultadomodificar (mvalidarmodificarusuario());
				break;
			case '7':
				//Mostrar eliminar
				vmostrareliminarusuario (mdatosusuario());
				break;
			case '8':
				//Validar eliminar
				vmostrarresultadoeliminarusuario (mvalidareliminarusuario());
				break;
		}
    }
	else if ($accion == "producto"){
        switch ($id) {
			case '1':
				// Mostrar alta
				vmostraraltaproducto();
				break;
			case '2':
				//Validar alta
				vmostrarresultadoaltaproducto(mvalidaraltaproducto());
				break;
			case '3':
				//Listado
				vmostrarlistadoproductos(mdatosproductos(), "listado");
				break;
			case '4':
				//Listado
				vmostrarlistadoproductos(mdatosproductos(), " ");
				break;
			case '5':
				//Mostrar Modificar
				vmostrarmodificarproducto(mdatosproducto());
				break;
			case '6':
				//Modificar producto
				vmostrarresultadomodificarproducto (mvalidarmodificarproducto());
				break;
			case '7':
				//Mostrar eliminar
				vmostrareliminarproducto (mdatosproducto());
				break;
			case '8':
				//Validar eliminar
				vmostrarresultadoeliminarproducto (mvalidareliminarproducto());
				break;
		}
    } else if ($accion == "carrito") {
		switch ($id) {
			case '1':
				// Mostrar listado carritos
				vmostrarlistadocarritos(mmostrarlistadocarritos(mdatoscarritoslistado(), "listado"));
				break;
			case '2':
				// Mostrar listado carritos bym
				vmostrarlistadocarritos(mmostrarlistadocarritos(mdatoscarritoslistado(), ""));
				break;
			case '3':
				// Mostrar listado carritos bym
				vvalidareliminarcarrito(meliminarcarrito());
				break;
		}
	}else if($accion == "home"){
		switch ($id){
			case '1':
				//home
				vmostrarmenu(mrecuperarDatosUsuario());
				break;
			case '2':
				//about
				vmostrarabout(mrecuperarDatosUsuario());
				break;
			case '3':
				//menu
				vmostrarmenucarta(mrecuperarDatosUsuario());
				break;	
			case '4':
				//special-dishes
				vmostrarnovedades(mrecuperarDatosUsuario());
				break;
		}
	}else if($accion == "login"){
		switch ($id){
			case '1':
				//login
				vmostrarresultadologin(mdatoslogin());
				break;
		}
	}else if ($accion == "editar"){
		switch ($id){
			case '1':
				//Mostrar editar perfil
				vmostrareditarperfil(meditarperfil());
				break;	
			case '2':
				//Validar editar perfil
				vvalidareditarperfil(mvalidareditarperfil(), vcogereditarperfil(meditarperfil()), vcogermenueditarperfil(meditarperfil()));
				break;
		}
	}else if ($accion == "registro"){
		switch ($id){
			case '1':
				//Mostrar registro
				vmostrarregistro();
				break;
			case '2':
				//
				vmostrarresultadoregistro();
				break;
			case '3':
				//Mostrar resultado registro
				/*$_SESSION["0"] = $_POST["codigo0"];
				$_SESSION["1"] = $_POST["codigo1"];
				$_SESSION["2"] = $_POST["codigo2"];
				$_SESSION["3"] = $_POST["codigo3"];*/
				/*print_r($_SESSION["0"] . "xd");
				print_r($_SESSION["1"] . "xd");
				print_r($_SESSION["2"] . "xd");
				print_r($_SESSION["3"] . "xd");*/
				vmostrarcodigoverificacion(mmostrarresultadocodigoverificacion());
				break;	
			case '4':
				/*$_SESSION["0"] = $_POST["0"];
				$_SESSION["1"] = $_POST["1"];
				$_SESSION["2"] = $_POST["2"];
				$_SESSION["3"] = $_POST["3"];*/
				$resultado = vvalidarcodigoverificacion(mvalidarcodigoverificacion());
				if ($resultado == 1){
					vmostrarmenu(mrecuperarDatosUsuario());
				}else{
					$cuerpo = file_get_contents("codigoverificacion.html");
					$cuerpo = str_replace("Introduzca el codigo que le hemos enviado", "El codigo introducido es incorrecto. Pruebe de nuevo", $cuerpo);
					echo $cuerpo;
				}
				
				break;
		}
	}else if ($accion == "pedido"){
		switch ($id){
			case '1':
				//Validar realizar pedido
				vvalidarpedido(mvalidarpedido());
				break;
			case '2':
				echo file_get_contents("metodopago.html");
				break;
		}
	}else if ($accion == "metodopago"){
		switch ($id){
			case '1':
				echo file_get_contents("tarjetaCredito.html");
				break;
			case '2':
				echo file_get_contents("paypal.html");
				break;
		}
	}else if ($accion == "generarcsv"){
		switch ($id){
			case '1':
				//login
				vgenerarcsv();
				echo file_get_contents("menuAdmin.html");
				break;
		}
	}else if ($accion == "menu"){
		switch ($id){
			case '1':
				//login
				vmostrarmenu(mrecuperarDatosUsuario());
				break;
			case '2':
				//about
				vmostrarmenusalirsesion();
				break;	
		}
	} else if ($accion == "comentarios"){
		switch ($id){
			case '1':
				//login
				vmostrarcomentarios(mdatoscomentarios());
				break;
			case '2':
				//login
				$textarea = $_GET['textarea'];
				$error = vañadirComentario($textarea);
				if ($error == 1){
					vmostrarcomentarios(mdatoscomentarios());
				} else{
					vmostrarcomentarios(mdatoscomentarios());
					echo "<br> Debes estar registrado para poder comentar";
				}
				break;
		}
	} else{
		echo "error";
	}

	

?>