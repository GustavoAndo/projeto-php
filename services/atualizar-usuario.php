<?php
    include_once("../database/conexao.php");

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $projeto = $_POST['projeto'];

    if (empty($projeto)) {
        $result = "UPDATE usuarios SET usu_nome='$nome', usu_email='$email', id_projeto=NULL WHERE usu_matricula='$matricula'";
    } else {
        $result = "UPDATE usuarios SET usu_nome='$nome', usu_email='$email', id_projeto='$projeto' WHERE usu_matricula='$matricula'"; 
    }

    $resultado = mysqli_query($conn, $result);

    if(mysqli_affected_rows($conn)){
        header("Location: ../index.php");
    } else {
        header("Location: ../pages/edicao-usuario.php?matricula=$matricula");
    }
?>