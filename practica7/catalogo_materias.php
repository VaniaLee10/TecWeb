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

    //***CREAR MATERIA***
    if(isset($_POST['guardar'])){
        $AgregarMaterias = "INSERT INTO materia (id, nombre_materia) 
            VALUES ( NULL, '".$_POST['nombre_materia']."');";
        $ResultadoAgregar = mysqli_query($Conexion, $AgregarMaterias);
    }

    //***ACTUALIZAR MATERIA***
    if(isset($_POST['actualizar'])){
        $idMateria = $_POST['idMateria'];
        $nombre_materia = $_POST['nombre_materia'];
        //actualizar
        $ConsultaActualizar = "UPDATE materia
            SET nombre_materia = '".$nombre_materia."'
                WHERE id = ".$idMateria;
        $ResultadoActualizar = mysqli_query($Conexion, $ConsultaActualizar);
        //echo $ConsultaActualizar;
    }

    //***ELIMINAR MATERIA***
    if(isset($_POST['eliminar'])){
        $idMateria = $_POST['idMateria'];
        $ConsultaEliminar = "DELETE FROM materia WHERE id = $idMateria";
        $ResultadoEliminar = mysqli_query($Conexion, $ConsultaEliminar);
    }

    //2. Definimos la consulta a la base de datos
    $ConsultaMaterias = "SELECT * FROM materia";

    //3. Ejecutamos la consulta
    $ResultadoMaterias = mysqli_query($Conexion, $ConsultaMaterias);

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
    <h1>Alta de Materias</h1>
    <h2><a href="menu.php">Menú</a></h2>
    <form action="catalogo_materias.php" method="post">
        <table cellspacing="0" cellpading="3" border="1" style="margin: 0 auto; background: rgb(194, 241, 255);">
            <tr>
                <td><label for="nombre_materia">Materia</label></td>
                <td><textarea name="nombre_materia" id="nombre_materia" cols="50"></textarea></td>
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
                while($RegistroMaterias = mysqli_fetch_assoc($ResultadoMaterias)){
                    echo '<tr>';
                    echo '<td>'.$RegistroMaterias['id'].'</td>';
                    echo '<td>'.$RegistroMaterias['nombre_materia'].'</td>';
                    echo '<td>[ <a href="actualizar_materias.php?id='.$RegistroMaterias['id'].'">Actualizar</a> | 
                    <a href="eliminar_materias.php?id='.$RegistroMaterias['id'].'">Eliminar</a> ]</td>';
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