<?php

$titulo = $_POST['titulo'];
$cuerpo = $_POST['cuerpo'];
$categoria = $_POST['categoria'];
$imagen = $_FILES['imagen'];
$autor = $_POST['autor'];
$estado = 1; // estado de subida de la noticia
$img_error="";

$nombre_archivo = "imagen";
$target_dir = "img/";
$target_file = $target_dir . $nombre_archivo . '.jpg';
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($imagen["tmp_name"]);

echo "Verificación de los datos:";
echo "<br>";

if ($titulo=="") {
    echo "No se ha escrito un título para la noticia X";
    echo "<br>";
    $estado = 0;
}
if ($cuerpo=="") {
    echo "No se ha escrito un cuerpo para la noticia X";
    echo "<br>";
    $estado = 0;
}
if ($categoria=="") {
    echo "No se ha escrito una categoria para la noticia X";
    echo "<br>";
    $estado = 0;
}
if ($autor=="") {
    echo "No se ha escrito el autor de la noticia X";
    echo "<br>";
    $estado = 0;
}
echo "<br>";

echo "Verificación de la imagen:";
echo "<br>";
//Verifica que sea una imagen
if($check !== false) {
    echo "El archivo es una imagen - " . $check["mime"] . ". ✔";
    echo "<br>";
} else {
    echo "El archivo no es una imagen X";
    echo "<br>";
    $estado = 0;
}

//Verificar que solo sean archivos .jpg .png .jpng .gif
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "solo se permiten archivos tipo JPG, JPEG, PNG y GIF X";
        echo "<br>";
        $estado = 0;
}else {
    echo "Formato de archivo valido ✔";
    echo "<br>";
}

//Verifica el tamaño máximo de la imagen sea 1MB (1mb = 1048576 bytes)
if ($imagen["size"] > 1048576) {                            
    echo "El archivo no se pudo subir, tamaño máximo 1MB X";
    echo "<br>";
    $estado = 0;
}else {
    echo "Tamaño de archivo valido ✔";
    echo "<br>";
}
echo "<br>";
echo "Estado de subida del archivo:";
echo "<br>";
if ($estado == 1) {
    move_uploaded_file($imagen["tmp_name"], $target_file);
    echo "Imagen " . $imagen['name'] . " guardada con exito en la carpeta img ✔";
    echo "<br>";

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "multimedia_prueba_1";

    $conexion = mysqli_connect($host, $user, $pass, $db);

    $consulta = "INSERT INTO ejercicio_1 (titulo, cuerpo, categoria, img, autor) 
            VALUES('$titulo', '$cuerpo', '$categoria', '$target_file', '$autor')";

    if (mysqli_query($conexion, $consulta)) {
    echo "Registro ingresado con exito en la base de datos ✔";
    echo "<br>";
    }else{
    echo "Error al ingresar la noticia";
    echo "<br>";
    }
}else {
    echo "Error al ingresar la noticia";
}
