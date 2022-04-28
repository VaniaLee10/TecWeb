<?php
    session_start();
    //echo "Sesion id: ". session_id();
    //Verificar que el usuario haya iniciado sesion
    //if(isset($_SESSION['login']))
    if($_SESSION['login']=='0'){
        //Redireccionar al usuario a la página de login.php
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7 - Index</title>
</head>
<body>
    <?php echo "<h1>Menú </h1>" ?>
    <table cellspacing=cellspacing="0" cellpading="3" border="1" style="margin: 0 auto; background: rgb(194, 241, 255);">
    <tr>
        <td><a href="catalogo_materias.php">Catalogo de Materias </a></td>
    </tr>
    <tr>
        <td><a href="catalogo_docentes.php">Catalogo de Docentes</a> </td>
    </tr>
    <tr>
        <td><a href="catalogo_semestre.php">Catalogo de Semestre</a> </td>
    </tr>
    <tr>
        <td><a href="cerrar_sesion.php">Cerrar sesión </a> </td>
    </tr>
    </table>
</body>
</html>