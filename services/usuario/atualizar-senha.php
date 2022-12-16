<?php
    include_once("../../database/conexao.php");
    session_start();

    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    $error = false;
    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    $tagStartError = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>";
    $tagEndError = "<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
    
    if(empty($senha)) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "Preencha o campo com a nova senha!" . $tagEndError;
    } elseif(strlen($senha) < 8) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "A senha deve conter pelo menos 8 caracteres." . $tagEndError;
    }

    if (!$error) {

        $senhaCript = md5(md5($senha));
        $result = "UPDATE usuarios SET usu_senha=' $senhaCript', WHERE usu_matricula='$matricula'";

        $resultado = mysqli_query($conn, $result);
        
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Senha redefinida com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/usuario/tabela.php");
        } else {
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao redefinir senha.<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/usuario/edicao.php?matricula=$matricula");
        }
    
    } else {
        
        header("Location: ../../pages/usuario/redefinicao-senha.php?matricula=$matricula");

    }
?>