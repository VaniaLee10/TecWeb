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
    $idSemestre = $_GET['id'];

    //2. Definimos nuestra consulta
    $ConsultaSemestre = "SELECT * FROM semestre WHERE id = ".$idSemestre."";

    //3. Ejecutar consulta
    $ResultadoSemestre = mysqli_query($Conexion, $ConsultaSemestre);
    $RegistroSemestre = mysqli_fetch_assoc($ResultadoSemestre);

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
    <title>Práctica 7 - Eliminar semestre</title>
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1><center>Eliminar Semestre</center></h1>
    <form action="catalogo_semestre.php" method="post">
    <form>
        <table cellspacing="50" cellpading="3" style="margin: 0 auto; background: rgb(175, 221, 235);">
            <tr>
                <th>Semestre</th>
                <td><?php echo $RegistroSemestre['nombre_semestre'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="eliminar" id="eliminar" value="Eliminar"> </td>
                <input type="hidden" name="idSemestre" id="idSemestre" value="<?php echo $_GET['id'] ?>">
                <td> <a href="catalogo_semestre.php">Cancelar</a> </td>
            </tr>
        </table>
    </form>
</body>
</html>