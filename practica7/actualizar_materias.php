<?php
    session_start();
    if($_SESSION['login']=='0'){
        header('Location: login.php');
    }

    //1. Conectarnos a nuestra base de datos
    $Conexion=mysqli_connect('localhost','root','','escuela');

    //1.1 Verificar que se pudo conectar a la base de datos
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7 - Actualizar Materias</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1><center>Actualizar Materias</center></h1>
    <form action="catalogo_materias.php" method="post">
    <form>
        <table cellspacing="50" cellpading="3" style="margin: 0 auto; background: rgb(175, 221, 235);">
            <tr>
                <td><label for="nombre_materia">Nombre materia:</label></td>
                <td><input type="text" name="nombre_materia" id="nombre_materia" size=50 value="<?php echo $RegistroMaterias['nombre_materia']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="actualizar" id="actualizar" value="Actualizar"> </td>
                <input type="hidden" name="idMateria" id="idMateria" value="<?php echo $_GET['id'] ?>">
                <td> <a href="catalogo_materias.php">Cancelar</a> </td>
            </tr>
        </table>
    </form>
</body>
</html>