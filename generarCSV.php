<?php
    include "modelo.php"
    //Conexion local
    $con = conexion();

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
?>