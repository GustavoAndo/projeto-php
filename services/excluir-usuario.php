<?php
    include_once("../database/conexao.php");
    session_start();

    $matricula = $_GET['matricula'];

    if (!empty($matricula)){
        $result = "DELETE FROM usuarios WHERE usu_matricula='$matricula'";
        $resultado = mysqli_query($conn, $result);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p id='aviso'>Usuário excluído!<button onClick='fechar()'>X</button></p>";
            header("Location: ../index.php");
        } else {
            $_SESSION['msg'] = "<p id='aviso'>Erro ao excluir o usuário.<button onClick='fechar()'>X</button></p>";
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
    }
?>