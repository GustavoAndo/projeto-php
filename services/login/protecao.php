<?php
    session_start();

    if(!isset($_SESSION['login_matricula'])) {
        header('Location: /crud-php/pages/login/login.php');
    }
?>