<?php
    session_start();
    if($_SESSION['login']=='0'){
        header('Location: login.php');
    }

    //1. Conectarnos a nuestra base de datos
    $Conexion=mysqli_connect('localhost','root','','escuela');

    //1.1 Verificamos la conexion
    if(!$Conexion){
        die("Error al conectarse a la base de datos: ".mysqli_connect_error());
    }
    $IDMateria = $_GET['id'];

    //2. Definimos nuestra consulta
    $ConsultaMaterias = "SELECT * FROM materia WHERE id = ".$IDMateria."";

    //3. Ejecutar consulta
    $ResultadoMaterias = mysqli_query($Conexion, $ConsultaMaterias);
    $RegistroMaterias = mysqli_fetch_assoc($ResultadoMaterias);

    //Imprimir los parametros que vienen por GET
    //echo "Parametros por GET: ";
    //print_r($_GET);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 7</title>
</head>
<body>
    <h1>Eliminar Materias</h1>
    <form action="catalogo_materias.php" method="post">
        <table cellspacing="0" cellpading="3" border="1" style="margin: 0 auto; background: rgb(194, 241, 255);">
            <tr>
                <th>Materia</th>
                <td><?php echo $RegistroMaterias['nombre_materia'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="eliminar" id="eliminar" value="Eliminar">
                    <input type="hidden" name="idMateria" id="idMateria" value="<?php echo $_GET['id'] ?>">
                    <a href="catalogo_materias.php">Cancelar</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>