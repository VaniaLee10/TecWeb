<?php
    session_start();
    /*echo "Sesion id: ". session_id();
    echo "<br>";
    echo "Contenido del arreglo POST <br>";
    print_r($_POST);
    echo "<br>";*/

    $username = '';
    $contraseña = '';

    if(isset($_POST['username'])&&isset($_POST['contraseña'])){
        $username = $_POST['username'];
        $contraseña = $_POST['contraseña'];
    }
    $conexion=mysqli_connect('localhost','root','','escuela');
    if(!$conexion){
        die("Error al conectarse a la base de datos: ".mysqli_connect_error());
    }

    $ConsultaCredenciales = "SELECT nombre FROM usuario 
                    WHERE username = '".$username."' AND contraseña='".$contraseña."'";

    $ResultadoCredenciales = mysqli_query($conexion, $ConsultaCredenciales);

    if (mysqli_num_rows($ResultadoCredenciales)>0){
            $Renglon = mysqli_fetch_assoc($ResultadoCredenciales);            
            $_SESSION['username']=$username;
            $_SESSION['nombre']=$Renglon['nombre'];
            $_SESSION['login']=1;
            header('Location: menu.php');
        }else{
            echo "Usuario y/o  contraseña Incorrectos";
            $_SESSION['login']=0;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
</head>

<style>
    tr, td{
        margin: 0 auto ;
        background:rgb(184, 223, 241);
        border-radius: 10px;
        border: 1px solid black;
    }
</style>

<body>
    <center><h1 center>Acceso al Sistema</h1></center>
    <form action="login.php" method="post">
        <table cellspacing="1" cellpadding="15" style="margin: 0 auto ;">
            <tr>
                <td><input input type="text" name="username" id="username" placeholder="Username"></input></td>
            </tr>
            <tr>
                <td><input input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"></input></td>
            </tr>
            <tr>
                <td><center><input input type="submit" name="login" id="login" value="Ingresar" center></input></center></td>
            </tr>
        </table>
    </form>
</body>
</html>