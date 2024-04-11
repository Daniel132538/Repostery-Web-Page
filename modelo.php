<?php
    function conexion () {
		//Conexion local
		//$con = mysqli_connect("localhost", "root", "", "db_grupo44");

		//Conexion nube
		$con = mysqli_connect("dbserver", "grupo44", "soh5eeMeiz", "db_grupo44");

		return $con;
	}
    function activar_sesion(){
        session_start();
    }

    function mvalidaraltausuario(){
        $con = conexion();

        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];	
        }if (isset($_POST['apellido1'])) {
            $apellido1 = $_POST['apellido1'];	
        }if (isset($_POST['apellido2'])) {
            $apellido2 = $_POST['apellido2'];	
        }if (isset($_POST['contraseña'])) {
            $contraseña = $_POST['contraseña'];	
        }if (isset($_POST['contraseña2'])) {
            $contraseña2 = $_POST['contraseña2'];	
        }if (isset($_POST['email'])) {
            $email = $_POST['email'];	
        }if (isset($_POST['telefono'])) {
            $telefono = $_POST['telefono'];	
        }if (isset($_POST['direccion'])) {
            $direccion = $_POST['direccion'];	
        }
        
        if (empty($nombre) || empty($apellido1) || empty($apellido2)
        || empty($email) || empty($contraseña) || empty($contraseña2) || empty($direccion) || empty($telefono)){
            return -1;
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
            return -2;
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$apellido1)) {
            return -3;
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$apellido2)) {
            return -4;
        }
        if (!is_numeric($telefono)){
            return -5;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return -6;
        }
        if ($contraseña === $contraseña2){
            
        } else{
            return -7;
        }
    
        //Verificar que el usuario no existe
        $consulta = "select email from final_usuario where email = '$email'";
            
        $resultado = $con->query($consulta);
    
        if (mysqli_num_rows($resultado)>0)
        {
            return -8;
        } else {
            //$insert_value = 'INSERT INTO ' . $db_name . '.'.$db_table_name.' (Nombre , Apellido1 , Apellido2, email, Contraseña, Direccion, Fecha_alta, ID_Rol, Telefono) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';
            $id_rol = 1;
            $telefono_int = intval($telefono);
            $consulta = "insert into final_usuario (Nombre, Apellido1, Apellido2, email, Contraseña, Direccion, Fecha_alta, IDRol, Telefono) values ('$nombre', '$apellido1', '$apellido2', '$email', '$contraseña', '$direccion', now(), '$id_rol',  $telefono_int)";
                
            if ($con->query($consulta)){
                return 1;
             } else{
                return -9;
            }
        }
    }

    function mdatosrol(){
        $con = conexion();
		$consulta = "select final_rol.* from final_rol order by ID";

        if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
    }

    function mdatosusuarios() {
		$con = conexion();
		$consulta = "select final_usuario.* from final_usuario order by nombre, apellido1, apellido2";

		if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
	}

    function mdatosusuario() {
		$con = conexion();
        if (isset($_GET['idusuario'])){
            $idusuario = $_GET['idusuario'];
        }
		$consulta = "select final_usuario.* from final_usuario where ID = '$idusuario'";

		if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
	}

    function mdatosproductopost() {
		$con = conexion();

        if (isset($_POST["idproducto"])) {
            $idproducto = $_POST["idproducto"];	
        } else {
            if (isset($_POST["idproducto"])) {
                $idproducto = $_POST["idproducto"];
            } else {
                return -1;
            }
        }

		$consulta = "select final_producto.* from final_producto where ID = '$idproducto'";

		if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
	}

    function  mmostrarlistadocarritos($resultado, $tipolistado) {
        if (!is_object($resultado)) {
			mostrarmensaje("Listado personas", "No hemos podido coger la información de personas.");
		} else {
			if ($tipolistado == "listado") {
				$cadena = file_get_contents("listadocarritos.html");
			} else {
				$cadena = file_get_contents("listadocarritosbym.html");
			}
			
			$trozos = explode("##fila##", $cadena);

			$cuerpo = "";
			while ($datos = $resultado->fetch_assoc()) {
				$aux = $trozos[1];
                $aux = str_replace("##idcarrito##", $datos['ID'], $aux);
				$aux = str_replace("##nombre##", $datos['Nombre'], $aux);
                $aux = str_replace("##email##", $datos['Email'], $aux);
				$aux = str_replace("##preciototal##", $datos['precio'], $aux);
				$aux = str_replace("##fecha##", $datos['fecha_hora'], $aux);
				$cuerpo .= $aux;
			}

			return $trozos[0] . $cuerpo . $trozos[2];
		}
    }

    function mdatoscarritoslistado(){
        $con = conexion();
        $consulta = 'select final_carrito.ID ID, final_usuario.Nombre Nombre, final_usuario.Email Email, sum(final_producto.Precio*final_carrito_productos.cantidad) precio, final_carrito.fecha_hora from final_usuario, final_producto, final_carrito_productos, final_carrito where final_usuario.ID = final_carrito.IDUsuario and final_carrito.ID = final_carrito_productos.IDCarrito and final_carrito_productos.IDProducto = final_producto.ID group by final_carrito.fecha_hora, final_usuario.Nombre, final_carrito.ID, final_usuario.Email order by final_carrito.fecha_hora';
        
        if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
    }

    function meliminarcarrito(){
        $con = conexion();
        if (isset($_GET['idcarrito'])){
            $idcarrito = $_GET['idcarrito'];
        }
        $consulta = "delete from final_carrito_productos where IDCarrito = '$idcarrito'";
        if ($con->query($consulta)){
            $consulta = "delete from final_carrito where ID = '$idcarrito'";
            if ($con->query($consulta)){
                return 1;
            } else{
                return -1;
            }
        } else{
            return -1;
        }
    }

    function mnombreusuario($idusuario){
        $con = conexion();
        $consulta = "select Nombre from final_usuario where ID = '$idusuario'";
        $resultado = $con->query($consulta);
        $datos = $resultado->fetch_assoc();
        return $datos['Nombre'];
    }
    function mpreciottotalcarrito($idcarrito){
        $con = conexion();
        $consulta = "select cantidad*precio preciototal from final_carrito, final_carrito_productos, final_producto where final_carrito.ID = final_carrito_productos.IDCarrito and final_producto.ID = final_carrito_productos.IDProducto and final_carrito.ID = '$idcarrito'";
        $resultado = $con->query($consulta);
        $datos = $resultado->fetch_assoc();
        return $datos['preciototal'];
    }

    function mdatoscarritos() {
		$con = conexion();
		$consulta = "select final_carrito.* from final_carrito order by ID";

		if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
	}


    function mdatoscarrito() {
		$con = conexion();
        if (isset($_GET['idcarrito'])){
            $idcarrito = $_GET['idcarrito'];
        }
		$consulta = "select final_carrito.* from final_carrito where ID = '$idcarrito'";

		if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
	}

    function mdatosproductos() {
		$con = conexion();
		$consulta = "select final_producto.* from final_producto order by nombre";

		if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
	}

    function mdatosproducto() {
		$con = conexion();
       
        if (isset($_GET['idproducto'])){
            $idproducto = $_GET['idproducto'];
        } else {
            return -1;
        }

		$consulta = "select final_producto.* from final_producto where ID = '$idproducto'";

		if ($resultado = $con->query($consulta)) {
			return $resultado;
		} else {
			return -1;
		}
	}

    function mvalidarmodificarusuario() {
		$con = conexion();
        if (isset($_POST['idusuario'])) {
            $id = $_POST['idusuario'];	
        }
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];	
        }if (isset($_POST['apellido1'])) {
            $apellido1 = $_POST['apellido1'];	
        }if (isset($_POST['apellido2'])) {
            $apellido2 = $_POST['apellido2'];	
        }if (isset($_POST['contraseña'])) {
            $contraseña = $_POST['contraseña'];	
        }if (isset($_POST['contraseña2'])) {
            $contraseña2 = $_POST['contraseña2'];	
        }if (isset($_POST['email'])) {
            $email = $_POST['email'];	
        }if (isset($_POST['telefono'])) {
            $telefono = $_POST['telefono'];	
        }if (isset($_POST['direccion'])) {
            $direccion = $_POST['direccion'];	
        }if (isset($_POST['idrol'])) {
            $idrol = $_POST['idrol'];	
        }
		$consulta = "update final_usuario set Nombre = '$nombre', Apellido1 = '$apellido1', Apellido2 = '$apellido2', Contraseña = '$contraseña', Email = '$email', Telefono = '$telefono', Direccion = '$direccion', IDRol = '$idrol' where ID = '$id'";
		if ($con->query($consulta)) {
			return 1;
		} else {
			return -1;
		}
	}

    function mvalidareliminarusuario(){
        $con = conexion();
        
		if (isset($_POST['idusuario'])) {
            $idusuario = $_POST['idusuario'];	
        }
        
        $consulta = "select final_usuario.Nombre, final_carrito.ID from final_usuario, final_carrito where final_usuario.ID = final_carrito.IDUsuario and final_usuario.id = '$idusuario' order by final_carrito.ID";
        $resultado = $con->query($consulta);
        if (mysqli_num_rows($resultado)>0){
            while ($datos = $resultado->fetch_assoc()){
                $idcarrito = $datos['ID'];
                $consulta = "delete from final_carrito_productos where IDCarrito = '$idcarrito'";
                if (!$con->query($consulta)) {
                    return -1;
                }
            }
        }

		    $consulta = "delete from final_carrito where IDUsuario = '$idusuario'";

            if ($con->query($consulta)) {
                $consulta = "delete from final_comentario where IDUsuario = '$idusuario'";
                if ($con->query($consulta)){
                    $consulta = "delete from final_usuario where ID = '$idusuario'";
                    if ($con->query($consulta)) {
                        return 1;
                    } else {
                        return -1;
                    }
                } else{
                    return -1;
                }
            } else {
                    return -1;
            }
    }
    
    function mvalidaraltaproducto(){
        $con = conexion();

        //Cargamos el fichero

		/*if ($tipo = "image/jpeg") {
			$nombrefichero = time() . "-" . uniqid() . ".jpg";	
		} else{
            return -6;
        }*/

        $nombrefichero = $_FILES['fichero']['name'];

        //if (move_uploaded_file($temporal, 'imagenes/' . $nombrefichero)) {
            if (isset($_POST['nombre'])) {
                $nombre = $_POST['nombre'];	
            }if (isset($_POST['precio'])) {
                $precio = $_POST['precio'];	
            }
            
            if (empty($precio) || empty($nombre)){
                return -1;
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
                return -2;
            }
            if (!is_numeric($precio)){
                return -3;
            }

            //Verificar que el nombre no existe
            $consulta = "select email from final_usuario where nombre = '$nombre'";
                
            $resultado = $con->query($consulta);
        
            if (mysqli_num_rows($resultado)>0)
            {
                return -4;
            } else {
                $consulta = "insert into final_producto (Nombre, Precio, imagen) values ('$nombre', '$precio', '$nombrefichero')";
                if ($con->query($consulta)){
                    return 1;
                } else{
                    return -5;
                }
            }
        //} else{
           // return -6;
        //}
    }

    function mvalidarmodificarproducto() {
        $con = conexion();


        $resultado = mdatosproductopost();
        $datos = $resultado->fetch_assoc();

        //Cargamos el fichero
		$tipo = $_FILES['fichero']['name']; 



		/*if ($tipo = "image/jpeg") {
			$nombrefichero = time() . "-" . uniqid() . ".jpg";	
            $temporal = $_FILES['fichero']['tmp_name'];
            print_r("xd" . $temporal);
            if (move_uploaded_file($temporal, 'imagenes/' . $nombrefichero)) {*/
               $nombrefichero = tipo;

                if (isset($_POST['precio'])) {
                    $precio = $_POST['precio'];	
                } if (isset($_POST['nombre'])) {
                    $nombre = $_POST['nombre'];	
                }

                $idproducto = $datos['ID'];
                
                $consulta = "update final_producto set Nombre = '$nombre', Precio = '$precio', imagen ='$nombrefichero' where ID = '$idproducto'";
                
                if ($con->query($consulta)) {
                    return 1;
                } else {
                    return -1;
                }
            /*} else{
                if (isset($_POST['precio'])) {
                    $precio = $_POST['precio'];	
                } if (isset($_POST['nombre'])) {
                    $nombre = $_POST['nombre'];	
                }
                $idproducto = $datos['ID'];
                $consulta = "update final_producto set Nombre = '$nombre', Precio = '$precio' where ID = '$idproducto'";
                
                if ($con->query($consulta)) {
                    return 1;
                } else {
                    return -1;
                }
            }*/
		/*} else{
            if (isset($_POST['precio'])) {
                $precio = $_POST['precio'];	
            } if (isset($_POST['nombre'])) {
                $nombre = $_POST['nombre'];	
            }
            $idproducto = $datos['ID'];
            $consulta = "update final_producto set Nombre = '$nombre', Precio = '$precio' where ID = '$idproducto'";
            
            if ($con->query($consulta)) {
                return 1;
            } else {
                return -1;
            }
        }*/
        
	}

    function mvalidareliminarproducto(){
        $con = conexion();

        $idproducto = " ";
		if (isset($_POST['idproducto'])) {
            $idproducto = $_POST['idproducto'];	
        }

		$consulta = "delete from final_carrito_productos where IDProducto = '$idproducto'";

		if ($con->query($consulta)) {
            $consulta = "delete from final_producto where ID = '$idproducto'";
            if ($con->query($consulta)) {
                return 1;
            } else {
                return -1;
            }
		} else {
			return -1;
		}
    }
    /*function mguardardatospedido(){
        $con = conexion();

        if(isset($_SESSION['carrito'])){
            $carrito_mio=$_SESSION['carrito'];
            $totalpagar = 0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                $totalpagar = $totalpagar + $carrito_mio[$i]['precio']*$carrito_mio[$i]['cantidad'];
            }
        } else{
            return -1;
        }
    }*/ 

    function mdatoslogin(){
        $con = conexion();

        if (isset($_POST["email"])){
            $email = $_POST["email"];
        } if (isset($_POST["password"])){
            $password = $_POST["password"];
        }


        $consulta = "select * from final_usuario where Email = '$email' and Contraseña = '$password'";
        $resultado = $con->query($consulta);
        return $resultado;
    }

    function mdatosregistro(){
        $con = conexion();

        if (isset($_SESSION["email"])){
            $email = $_SESSION["email"];
        } 


        $consulta = "select * from final_usuario where Email = '$email'";
        $resultado = $con->query($consulta);
        return $resultado;
    }

    function mrecuperarDatosUsuario(){
        $con = conexion();
        //session_start();

        if (isset($_SESSION["idusuario"])){
            $idusuario = $_SESSION["idusuario"];
        } else{
            return -1;
        }

        $consulta = "select * from final_usuario where ID = '$idusuario'";
        $resultado = $con->query($consulta);
        return $resultado;
    }
    
    function meditarperfil(){
        //error_reporting(E_ERROR | E_WARNING);
        //session_start();    
        $con = conexion();
        

		$idusuario = $_SESSION['idusuario'];
        $consulta = "select * from final_usuario where ID = '$idusuario'";
		$resultado = $con->query($consulta);
        return $resultado;
    }

    function mvalidareditarperfil(){
        $con = conexion();
        
        if (isset($_POST['idusuario'])) {
            $id = $_POST['idusuario'];	
        }if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];	
        }if (isset($_POST['apellido1'])) {
            $apellido1 = $_POST['apellido1'];	
        }if (isset($_POST['apellido2'])) {
            $apellido2 = $_POST['apellido2'];	
        }if (isset($_POST['password'])) {
            $password = $_POST['password'];	
        }if (isset($_POST['password2'])) {
            $password2 = $_POST['password2'];	
        }if (isset($_POST['email'])) {
            $email = $_POST['email'];	
        }if (isset($_POST['telefono'])) {
            $telefono = $_POST['telefono'];	
        }if (isset($_POST['direccion'])) {
            $direccion = $_POST['direccion'];	
        }
        

        if (empty($nombre) || empty($apellido1) || empty($apellido2)
        || empty($email) || empty($password) || empty($password2) || empty($direccion) || empty($telefono)){
            return -1;
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
            return -2;
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$apellido1)) {
            return -3;
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$apellido2)) {
            return -4;
        }
        if (!is_numeric($telefono)){
            return -5;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return -6;
        }
        if ($password === $password2){
            
        } else{
            return -7;
        }        

		$consulta = "update final_usuario set Nombre = '$nombre', Apellido1 = '$apellido1', Apellido2 = '$apellido2', Contraseña = '$password', Email = '$email', Telefono = '$telefono', Direccion = '$direccion' where ID = '$id'";
		
        if ($con->query($consulta)) {
			return 1;
		} else {
			return -8;
		}
    }

    function mresultadoregistro(){
        $con = conexion ();
            if (isset($_POST['Nombre'])){
                $nombre = $_POST['Nombre'];     }
            if (isset($_POST['Apellido1'])){
                $apellido1 = $_POST['Apellido1'];    }
            if (isset($_POST['Apellido2'])){
                $apellido2 = $_POST['Apellido2'];    }
            if (isset($_POST['email'])){
                $email = $_POST["email"];    }
            if (isset($_POST['password'])){
                $password = $_POST["password"];    }
            if (isset($_POST['password2'])){
                $password2 = $_POST["password2"];    }
            if (isset($_POST['direccion'])){
                $direccion = $_POST["direccion"];    }
            if (isset($_POST['telefono'])){
                $telefono = $_POST["telefono"];
            }

            $cuerpo = file_get_contents("registerError.html");
            $error = FALSE;
            
            if (empty($nombre) || empty($apellido1) || empty($apellido2)
            || empty($email) || empty($password) || empty($password2) || empty($direccion) || empty($telefono)){
                $cuerpo = str_replace("##mensaje##", "Error rellena todas las casillas", $cuerpo);
                $error = TRUE;
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
                $cuerpo = str_replace("##mensaje##", "Error el nombre solo puede llevar letras y espacios", $cuerpo);
                $cuerpo = str_replace("##label1##", "red", $cuerpo);
                $cuerpo = str_replace("##input1##", " ", $cuerpo);
                $error = TRUE;
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$apellido1)) {
                $cuerpo = str_replace("##mensaje##", "Error el apellido solo puede llevar letras y espacios", $cuerpo);
                $cuerpo = str_replace("##label2##", "red", $cuerpo);
                $cuerpo = str_replace("##input2##", "", $cuerpo);
                $error = TRUE;
                
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$apellido2)) {
                $cuerpo = str_replace("##mensaje##", "Error el apellido solo puede llevar letras y espacios", $cuerpo);
                $cuerpo = str_replace("##label3##", "red", $cuerpo);
                $cuerpo = str_replace("##input3##", "", $cuerpo);
                $error = TRUE;
            }
            if (!is_numeric($telefono)){
                $cuerpo = str_replace("##mensaje##", "El numero de teléfono solo pueden ser dígitos", $cuerpo);
                $cuerpo = str_replace("##label8##", "red", $cuerpo);
                $cuerpo = str_replace("##input8##", "", $cuerpo);
                $error = TRUE;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $cuerpo = str_replace("##mensaje##", "El léxico del email es incorrecto.", $cuerpo);
                $cuerpo = str_replace("##label4##", "red", $cuerpo);
                $cuerpo = str_replace("##input4##", "", $cuerpo);
                $error = TRUE;
            }
            if ($password === $password2){
                
            } else{
                $cuerpo = str_replace("##mensaje##", "La contraseña no es la misma en ambas casillas.", $cuerpo);
                $cuerpo = str_replace("##label5##", "red", $cuerpo);
                $cuerpo = str_replace("##label6##", "red", $cuerpo);
                $cuerpo = str_replace("##input5##", "", $cuerpo);
                $cuerpo = str_replace("##input6##", "", $cuerpo);
                $error = TRUE;
            }
            $cuerpo = str_replace("##input1##", $nombre, $cuerpo);
            $cuerpo = str_replace("##input2##", $apellido1, $cuerpo);
            $cuerpo = str_replace("##input3##", $apellido2, $cuerpo);
            $cuerpo = str_replace("##input5##", $password, $cuerpo);
            $cuerpo = str_replace("##input6##", $password2, $cuerpo);
            $cuerpo = str_replace("##input7##", $direccion, $cuerpo);
            $cuerpo = str_replace("##input8##", $telefono, $cuerpo);

            //$resultado=mysqli_query("SELECT * FROM final_usuario WHERE Email = .$email.", $con);
            if ($error){
                $cuerpo = str_replace("##input4##", $email, $cuerpo);
                echo $cuerpo;
            } else{

                //Verificar que el usuario no existe
                $consulta = "select email from final_usuario where email = '$email'";
                
                $resultado = $con->query($consulta);

                if (mysqli_num_rows($resultado)>0)
                {
                    $cuerpo = str_replace("##mensaje##", "Este usuario ya tiene una cuenta registrada.", $cuerpo);
                    $cuerpo = str_replace("##label4##", "red", $cuerpo);
                    $cuerpo = str_replace("##input4##", " ", $cuerpo);
                } else {
                    //$insert_value = 'INSERT INTO ' . $db_name . '.'.$db_table_name.' (Nombre , Apellido1 , Apellido2, email, Contraseña, Direccion, Fecha_alta, ID_Rol, Telefono) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';
                    $cuerpo = str_replace("##input4##", $email, $cuerpo);
                    $id_rol = 1;
                    $consulta = "insert into final_usuario (Nombre, Apellido1, Apellido2, email, Contraseña, Direccion, Fecha_alta, IDRol, Telefono) values ('$nombre', '$apellido1', '$apellido2', '$email', '$password', '$direccion', now(), '$id_rol',  '$telefono')";
                    $_SESSION['consulta'] = $consulta;
                    $cuerpo = file_get_contents("registroverificacion.html");
                    $cuerpo = str_replace("##input1##", $nombre, $cuerpo);
                    $cuerpo = str_replace("##input2##", $apellido1, $cuerpo);
                    $cuerpo = str_replace("##input3##", $apellido2, $cuerpo);
                    $cuerpo = str_replace("##input4##", $email, $cuerpo);
                    $cuerpo = str_replace("##input5##", $password, $cuerpo);
                    $cuerpo = str_replace("##input6##", $password2, $cuerpo);
                    $cuerpo = str_replace("##input7##", $direccion, $cuerpo);
                    $cuerpo = str_replace("##input8##", $telefono, $cuerpo);
                    /*if ($con->query($consulta)){
                        $cuerpo = file_get_contents("login.html");
                    } else{
                        $cuerpo = str_replace("##mensaje##", "Ha ocurrido un error a la hora del registro, prueba de nuevo.", $cuerpo);
                    }*/
                }
                echo $cuerpo;
            }
            
    }
    
    function mvalidarpedido(){
        //session_start();
        $con = conexion();
        $resultado = mrecuperarDatosUsuario();
        $datos = $resultado->fetch_assoc();

        $idusuario = $datos['ID'];
        if (isset($_SESSION['carrito'])){
            $carrito_mio = $_SESSION['carrito'];
        } else{
            return -1;
        }

        $consulta = "insert into final_carrito(fecha_hora, IDUsuario) values (CURRENT_TIMESTAMP, '$idusuario')";

        if ($con->query($consulta)){
            $consulta = "select * from final_carrito where fecha_hora = (select max(fecha_hora) from final_carrito) and IDUsuario = '$idusuario'";
            $resultado = $con->query($consulta);
            $datos = $resultado->fetch_assoc();
            for($i=0;$i<=count($carrito_mio)-1;$i++){
                if($carrito_mio[$i]!=NULL){
                    $cantidad = $carrito_mio[$i]['cantidad'];
                    $precio= $carrito_mio[$i]['precio'];
			        $nombre= $carrito_mio[$i]['titulo'];
                    $consultaproducto = "select * from final_producto where Nombre = '$nombre' and Precio = '$precio'";
                    $resultadoproducto = $con->query($consultaproducto);
                    $datosproducto = $resultadoproducto->fetch_assoc();
                    $idcarrito = $datos['ID'];
                    $idproducto = $datosproducto['ID'];
                    $consultacarrito_mio = "insert into final_carrito_productos(IDCarrito, IDProducto, cantidad) values ('$idcarrito', '$idproducto', '$cantidad')";
                    if ($con->query($consultacarrito_mio)){
                    }else{
                        return -1;
                    }
                }
            }
        } else{
            return -1;
        }
        unset($_SESSION['carrito']); 
        return 1;
    }

    function mmostrarresultadocodigoverificacion(){
        if (isset($_POST['Nombre'])){
            $nombre = $_POST['Nombre'];     }
        if (isset($_POST['Apellido1'])){
            $apellido1 = $_POST['Apellido1'];    }
        if (isset($_POST['Apellido2'])){
            $apellido2 = $_POST['Apellido2'];    }
        if (isset($_POST['email'])){
            $email = $_POST["email"];  
            $_SESSION['email'] = $email ;
        }
        if (isset($_POST['password'])){
            $password = $_POST["password"];    }
        if (isset($_POST['password2'])){
            $password2 = $_POST["password2"];    }
        if (isset($_POST['direccion'])){
            $direccion = $_POST["direccion"];    }
        if (isset($_POST['telefono'])){
            $telefono = $_POST["telefono"];
        }
        if (isset($_POST['codigo0'])){
            $_SESSION['codigo0'] = $_POST["codigo0"];    }
        if (isset($_POST['codigo1'])){
            $_SESSION['codigo1'] = $_POST["codigo1"];    }
        if (isset($_POST['codigo2'])){
            $_SESSION['codigo2'] = $_POST["codigo2"];    }
        if (isset($_POST['codigo3'])){
            $_SESSION['codigo3'] = $_POST["codigo3"];
        }


        /*if ($codigo1 == $_SESSION["1"] && $codigo2 == $_SESSION["2"] && $codigo3 == $_SESSION["3"] && $codigo4 == $_SESSION["4"]){
            $cuerpo = file_get_contents("");
        } else{*/
        $cuerpo = file_get_contents("codigoverificacion.html");
        $cuerpo = str_replace("##input1##", $nombre, $cuerpo);
        $cuerpo = str_replace("##input2##", $apellido1, $cuerpo);
        $cuerpo = str_replace("##input3##", $apellido2, $cuerpo);
        $cuerpo = str_replace("##input4##", $email, $cuerpo);
        $cuerpo = str_replace("##input5##", $password, $cuerpo);
        $cuerpo = str_replace("##input6##", $password2, $cuerpo);
        $cuerpo = str_replace("##input7##", $direccion, $cuerpo);
        $cuerpo = str_replace("##input8##", $telefono, $cuerpo);
        //}
        return $cuerpo;
    }
    function mvalidarcodigoverificacion(){
			
            if (isset($_POST['input0'])){
                $input0 = $_POST['input0'];     }
            if (isset($_POST['input1'])){
                $input1 = $_POST['input1'];    }
            if (isset($_POST['input2'])){
                $input2 = $_POST['input2'];    }
            if (isset($_POST['input3'])){
                $input3 = $_POST["input3"];    }
            
            if (isset($_POST['email'])){
                $email = $_POST["email"];    }

                /*print ($input0. "xd");
                print ($input1. "xd");
                print ($input2. "xd");
                print ($input3. "xd");
                print ($_SESSION['codigo0']. "xd");
                print ($_SESSION['codigo1']. "xd");
                print ($_SESSION['codigo2']. "xd");
                print ($_SESSION['codigo3']. "xd");*/
            
            if ($_SESSION['codigo0'] == $input0 && $_SESSION['codigo1'] == $input1 && $_SESSION['codigo2'] == $input2 && $_SESSION['codigo3'] == $input3){
                $con = conexion();
                $consulta = $_SESSION['consulta'];
                if ($con->query($consulta)){
                    $_SESSION['codigo0'] = "";
                    $resultado = mdatosregistro();
                    if (mysqli_num_rows($resultado) == 1){
                        $datos = $resultado->fetch_assoc();
                        $_SESSION['idusuario'] = $datos['ID'];
                        $_SESSION['email'] =  $datos["Email"];
                        $_SESSION['nombre'] =  $datos["Nombre"];
                        $_SESSION['apellido1'] =  $datos["Apellido1"];
                        $_SESSION['apellido2'] =  $datos["Apellido2"];
                        $_SESSION['telefono'] =  $datos["Telefono"];
                        $_SESSION['direccion'] =  $datos["Direccion"];
                        return 1;
                    }else{
                        return 1;
                    }
                } else{
                    return -1;
                }
            } else{
                if ($_SESSION['codigo0'] == ""){
                    return 1;
                }
                else{
                    return -1;
                }
            }
    }
    function mdatoscomentarios(){
        $con = conexion();
        $consulta = "select * from final_usuario, final_comentario WHERE final_usuario.ID = final_comentario.IDUsuario order by Fecha_comentario";
        if ($resultado = $con->query($consulta)){
            return $resultado;
        } else{
            return -1;
        }
    }
    
?>