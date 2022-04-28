<?php
    session_start();

    //1. Establecer la conexion a la base de datos
    if($_SESSION['login']=='0'){
        header('Location: login.php');
    }

    $Conexion=mysqli_connect('localhost','root','','escuela');

    //1.1 Verificar que se pudo conectar a la base de datos
    if(!$Conexion){
        die("Error al conectarse a la base de datos: ".mysqli_connect_error());
    }

    //***CREAR SEMESTRE***
    if(isset($_POST['guardar'])){
        $AgregarSemestres = "INSERT INTO semestre (id, nombre_semestre) 
            VALUES ( NULL, '".$_POST['nombre_semestre']."');";
        $ResultadoAgregar = mysqli_query($Conexion, $AgregarSemestres);
    }

    //***ACTUALIZAR SEMESTRE***
    if(isset($_POST['actualizar'])){
        $idSemestre = $_POST['idSemestre'];
        $nombre_semestre = $_POST['nombre_semestre'];
        //actualizar
        $ConsultaActualizar = "UPDATE semestre
            SET nombre_semestre = '".$nombre_semestre."'
                WHERE id = ".$idSemestre;
        $ResultadoActualizar = mysqli_query($Conexion, $ConsultaActualizar);
        //echo $ConsultaActualizar;
    }

    //***ELIMINAR SEMESTRE***
    if(isset($_POST['eliminar'])){
        $idSemestre = $_POST['idSemestre'];
        $ConsultaEliminar = "DELETE FROM semestre WHERE id = $idSemestre";
        $ResultadoEliminar = mysqli_query($Conexion, $ConsultaEliminar);
    }

    //2. Definimos la consulta a la base de datos
    $ConsultaSemestres = "SELECT * FROM semestre";

    //3. Ejecutamos la consulta
    $ResultadoSemestres = mysqli_query($Conexion, $ConsultaSemestres);

    //Imprimir los parametros que vienen por POST
    //echo "Parametros por POST: ";
    //print_r($_POST);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 7</title>
</head>
<body>
    <h1>Alta de Semestre</h1>
    <h2><a href="menu.php">Menú</a></h2>
    <form action="catalogo_semestre.php" method="post">
        <table cellspacing="0" cellpading="3" border="1" style="margin: 0 auto; background: rgb(194, 241, 255);">
            <tr>
                <td><label for="nombre_semestre">Semestre</label></td>
                <td><textarea name="nombre_semestre" id="nombre_semestre" cols="50"></textarea></td>
            </tr>
            <td></td>
            <td>
                <input type="submit" name="guardar" id="guardar" value="Guardar datos">
                <input type="reset" name="limpiar" id="limpiar" value="Limpiar formulario">
            </td>
            </tr>
        </table>
    </form>
    
    <br>
    <br>
    <!--Para ver los registros-->
    <table  cellspacing="0" cellpadding="3"  border="1" style="margin: 0 auto; background: rgb(243, 228, 255);">
        <thead>
            <tr style="background-color: rgb(161, 125, 194);">
                <th>ID</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($RegistroSemestre = mysqli_fetch_assoc($ResultadoSemestres)){
                    echo '<tr>';
                    echo '<td>'.$RegistroSemestre['id'].'</td>';
                    echo '<td>'.$RegistroSemestre['nombre_semestre'].'</td>';
                    echo '<td>[ <a href="actualizar_semestre.php?id='.$RegistroSemestre['id'].'">Actualizar</a> | 
                    <a href="eliminar_semestre.php?id='.$RegistroSemestre['id'].'">Eliminar</a> ]</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
        <tfoot>
            <tr style="background-color: rgb(161, 125, 194);">
                <th>ID</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>