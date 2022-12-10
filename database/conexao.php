<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bdname = "crud";

    $conn = mysqli_connect($servidor, $usuario, $senha, $bdname);

    if($conn->connect_errno) {
        echo "Falha na Conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>