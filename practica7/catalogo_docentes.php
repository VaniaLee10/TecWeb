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

    //***CREAR PROFESOR***
    if(isset($_POST['guardar'])){
        $ConsultaAgregar = "INSERT INTO profesor (
        id, nombre, apellido_paterno, apellido_materno, num_empleado) 
        VALUES (
        NULL, 
        '".$_POST['nombre']."',
        '".$_POST['apellido_paterno']."',
        '".$_POST['apellido_materno']."',
        '".$_POST['num_empleado']."');";
        $ResultadoAgregar = mysqli_query($Conexion, $ConsultaAgregar);
    }


    //***ACTUALIZAR PROFESOR***
    if(isset($_POST['actualizar'])){
        $idProfesor = $_POST['idProfesor'];
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $num_empleado = $_POST['num_empleado'];
        //actualizar
        $ConsultaActualizar = "UPDATE profesor 
            SET nombre = '".$nombre."',
                apellido_paterno = '".$apellido_paterno."',
                apellido_materno = '".$apellido_materno."',
                num_empleado = '".$num_empleado."'
            WHERE id = ".$idProfesor;
        $ResultadoActualizar = mysqli_query($Conexion, $ConsultaActualizar);
        echo $ConsultaActualizar;
    }

    //***ELIMINAR PROFESOR***
    if(isset($_POST['eliminar'])){
        $idProfesor = $_POST['idProfesor'];
        $ConsultaEliminar = "DELETE FROM profesor WHERE id = $idProfesor";
        $ResultadoEliminar = mysqli_query($Conexion, $ConsultaEliminar);
    }

    //2. Definimos la consulta a la base de datos
    $ConsultaProfesor = "SELECT * FROM profesor";

    //3. Ejecutamos la consulta
    $ResultadoProfesor = mysqli_query($Conexion, $ConsultaProfesor);

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
    <h1>Alta de Docentes</h1>
    <h2><a href="menu.php">Menú</a></h2>
    <form action="catalogo_docentes.php" method="post">
        <table cellspacing="0" cellpading="3" border="1" style="margin: 0 auto; background: rgb(194, 241, 255);">
            <thead>
                <td></td>
                <td>Profesor</td>
            </thead>
            <tr>
                <td><label for="nombre">Nombre</label></td>
                <td><textarea name="nombre" id="nombre" cols="50"></textarea></td>
            </tr>
            <tr>
                <td><label for="apellido_paterno">Apellido Paterno</label></td>
                <td><textarea name="apellido_paterno" id="apellido_paterno" cols="50"></textarea></td>
            </tr>
            <tr>
                <td><label for="apellido_materno">Apellido Materno</label></td>
                <td><textarea name="apellido_materno" id="apellido_materno" cols="50"></textarea></td>
            </tr>
            <tr>
                <td><label for="num_empleado">Numero de empleado</label></td>
                <td><textarea name="num_empleado" id="num_empleado" cols="50"></textarea></td>
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
    <br>

    
    <table  cellspacing="0" cellpadding="3"  border="1" style="margin: 0 auto; background: rgb(243, 228, 255);">
        <thead>
            <tr style="background-color: rgb(161, 125, 194);">
                <th>ID</th>
                <th>Nombre</th>
                <th>Numero de empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($RegistroProfesores = mysqli_fetch_assoc($ResultadoProfesor)){
                    echo '<tr>';
                    echo '<td>'.$RegistroProfesores['id'].'</td>';
                    echo '<td>'.$RegistroProfesores['nombre']." ".$RegistroProfesores['apellido_paterno']." ".$RegistroProfesores['apellido_materno'].'</td>';
                    echo '<td>'.$RegistroProfesores['num_empleado'].'</td>';
                    echo '<td>[ <a href="actualizar_profesor.php?id='.$RegistroProfesores['id'].'">Actualizar</a> | 
                    <a href="eliminar_profesor.php?id='.$RegistroProfesores['id'].'">Eliminar</a> ]</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
        <tfoot>
            <tr style="background-color: rgb(161, 125, 194);">
                <th>ID</th>
                <th>Nombre</th>
                <th>Numero de empleado</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>