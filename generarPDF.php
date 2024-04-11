<?php
    include "libreriaGenerarPDF.php";
    include "modelo.php";
    //Conexion local
    $resultado = mdatoscarritoslistado();
    
    $data = array();
    while( $fila = $resultado->fetch_assoc()){
    //foreach ($resultado->fetch_assoc() as $line){
        $id = $fila['Nombre'];
        $Email = $fila['Email'];
        $nombre = $fila['precio'];
        $Fecha_alta = $fila['fecha_hora'];

        $data[] = [$id, $Email, $nombre, $Fecha_alta];
    }
    
    
    
    $header = array('Nombre', 'Email', 'Precio de carrito', 'Fecha');
    generarPDF($data, $header);
?>