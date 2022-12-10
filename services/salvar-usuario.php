<?php
    include_once("../database/conexao.php");

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));
    $projeto = $_POST['projeto'];

    if (empty($projeto)) {
        $result = "INSERT INTO usuarios (usu_matricula, usu_nome, usu_email, usu_senha) VALUES ('$matricula', '$nome', '$email', '$senha')";
    } else {
        $result = "INSERT INTO usuarios (usu_matricula, usu_nome, usu_email, usu_senha, id_projeto) VALUES ('$matricula', '$nome', '$email', '$senha' ,'$projeto')"; 
    }

    $resultado = mysqli_query($conn, $result);

    if(mysqli_affected_rows($conn)){
        header("Location: ../index.php");
    } else {
        header("Location: ../pages/cadastro-usuario.php");
    }
?>