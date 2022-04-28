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
    $idProfesor = $_GET['id'];

    //2. Definimos nuestra consulta
    $ConsultaProfesor = "SELECT * FROM profesor WHERE id = ".$idProfesor."";

    //3. Ejecutar consulta
    $ResultadoProfesor = mysqli_query($Conexion, $ConsultaProfesor);
    $RegistroProfesor = mysqli_fetch_assoc($ResultadoProfesor);

    //Imprimir los parametros que vienen por GET
    //echo "Parametros por GET: ";
    //print_r($_GET);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7 - Actualizar profesor</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1><center>Actualizar - Profesor</center></h1>
    <form action="catalogo_docentes.php" method="post">
    <form>
        <table cellspacing="50" cellpading="3" style="margin: 0 auto; background: rgb(175, 221, 235);">
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" name="nombre" id="nombre" size="50" value="<?php echo $RegistroProfesor['nombre']?>"></td>
            </tr>
            <tr>
                <td><label for="apellido_paterno">Apellido paterno:</label></td>
                <td><input type="text" name="apellido_paterno" id="apellido_paterno" size="50" value="<?php echo $RegistroProfesor['apellido_paterno']?>"></td>
            </tr>
            <tr>
                <td><label for="apellido_materno">Apellido materno:</label></td>
                <td><input type="apellido_materno" name="apellido_materno" id="apellido_materno" size="50" value="<?php echo $RegistroProfesor['apellido_materno']?>"></td>
            </tr>
            <tr>
                <td><label for="num_empleado">Número de empleado</label></td>
                <td><input type="text" name="num_empleado" id="num_empleado" size="50" value="<?php echo $RegistroProfesor['num_empleado']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td> <center> <input type="submit" name="actualizar" id="actualizar" value="Actualizar"> </center> </td>
                <input type="hidden" name="idProfesor" id="idProfesor" value="<?php echo $_GET['id'] ?>">
                <td> <a href="catalogo_docentes.php">Cancelar</a> </td>
            </tr>
        </table>
    </form>
</body>
</html>