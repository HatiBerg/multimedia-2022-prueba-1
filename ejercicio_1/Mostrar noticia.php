<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar noticia</title>
</head>
<body>
    <table border="1">
        <tr>
            <td><b>ID</b></td>
            <td><b>Título</b></td>
            <td><b>Cuerpo de la noticia</b></td>
            <td><b>Categoria</b></td>
            <td><b>Imagen</b></td>
            <td><b>Autor de la noticia</b></td>
        </tr>

        <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "multimedia_prueba_1";
    
            $conexion = mysqli_connect($host, $user, $pass, $db);
            $consulta="SELECT * FROM ejercicio_1";
            $resultado = mysqli_query($conexion, $consulta);

            while($mostrar=mysqli_fetch_array($resultado)){
        ?>

        <tr>
            <td><?php echo $mostrar['id'] ?></td>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['cuerpo'] ?></td>
            <td><?php echo $mostrar['categoria'] ?></td>
            <td><?php echo $mostrar['img'] ?></td>
            <td><?php echo $mostrar['autor'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>