<?php
    include_once("../../database/conexao.php");
    session_start();

    $matricula = $_POST['matricula'];
    $senha = md5(md5($_POST['senha']));

    $result = "UPDATE usuarios SET usu_senha='$senha', WHERE usu_matricula='$matricula'";

    $resultado = mysqli_query($conn, $result);

    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Senha redefinida com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/usuario/tabela.php");
    } else {
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao redefinir senha.<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/usuario/edicao.php?matricula=$matricula");
    }
?>