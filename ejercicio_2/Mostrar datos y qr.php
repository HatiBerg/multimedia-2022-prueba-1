<?php
    //Agregamos la librería para genera códigos QR
    require 'lib/phpqrcode/qrlib.php'; 

    //Guardamos los datos del formulario en variables
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];

    //Mostrar los datos recibidos del formulario
    echo "<b>Nombre: </b>" . $nombre;
    echo "<br>";
    echo "<b>Apellido: </b>" . $apellido;
    echo "<br><br>";

    //Declaramos una carpeta temporal para guardar la imágenes generadas
    $dir = 'temp/';

    //Si no existe la carpeta la creamos
    if (!file_exists($dir)){
        mkdir($dir);
    }

    //Declaramos la ruta y nombre del archivo a generar
    $filename = $dir.'qr.png';
    
    //Parámetros de Configuración
    $tamaño = 10; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	$contenido = $nombre." ".$apellido; //contenido del qr

    //Enviamos los parámetros a la Función para generar código QR 
    QRcode::png($contenido, $filename, $level, $tamaño, $framSize);

    //Mostramos la imagen generada
    echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
    
?>