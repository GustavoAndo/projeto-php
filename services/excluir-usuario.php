<?php
    include_once("../database/conexao.php");
    session_start();

    $matricula = $_GET['matricula'];

    if (!empty($matricula)){
        $result = "DELETE FROM usuarios WHERE usu_matricula='$matricula'";
        $resultado = mysqli_query($conn, $result);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Usuário excluído!<button class='btn btn-success btn-sm' onClick='fechar()'>X</button></p></div>";
            header("Location: ../index.php");
        } else {
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao excluir o usuário.<button class='btn btn-danger btn-sm' onClick='fechar()'>X</button></p></div>";
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
    }
?>