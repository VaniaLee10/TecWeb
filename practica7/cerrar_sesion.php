<?php
    session_start();
    //Vamos a destruir las variables de sesión
    //Redireccionar al login.php

    if (isset($_POST['login'])&&isset($_POST['boleta'])) {
        unset($_SESSION['login']);
        unset($_SESSION['boleta']);
    }
    header('Location: login.php');

?>