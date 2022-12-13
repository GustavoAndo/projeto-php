<?php
    include_once("../../database/conexao.php");
    session_start();

    $matricula = $_GET['matricula'];

    if (!empty($matricula)){
        $result = "DELETE FROM usuarios WHERE usu_matricula='$matricula'";
        $resultado = mysqli_query($conn, $result);

        $function = '(() => document.getElementById("aviso").innerHTML = "")()';
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Usuário excluído!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/usuario/tabela.php");
        } else {
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao excluir o usuário.<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/usuario/tabela.php");
        }
    } else {
        header("Location: ../index.php");
    }
?>