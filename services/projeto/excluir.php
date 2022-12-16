<?php
    include_once("../../database/conexao.php");
    include_once('../../services/login/protecao.php');

    $id = $_GET['id'];

    if (!empty($id)){
        $result = "DELETE FROM projetos WHERE pro_id='$id'";
        $resultado = mysqli_query($conn, $result);

        $function = '(() => document.getElementById("aviso").innerHTML = "")()';
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Projeto excluído!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/projeto/tabela.php");
        } else {
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao excluir o projeto.<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/projeto/tabela.php");
        }
    } else {
        header("Location: ../../pages/projeto/tabela.php");
    }
?>