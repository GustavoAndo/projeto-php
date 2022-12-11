<?php
    include_once("../database/conexao.php");
    session_start();

    $matricula = $_POST['matricula'];
    $senha = md5(md5($_POST['senha']));

    $result = "UPDATE usuarios SET usu_senha='$senha', WHERE usu_matricula='$matricula'";

    $resultado = mysqli_query($conn, $result);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p id='aviso'>Senha redefinida com sucesso!<button onClick='fechar()'>X</button></p>";
        header("Location: ../index.php");
    } else {
        $_SESSION['msg'] = "<p>Erro ao redefinir senha.</p><button onClick='fechar()'>X</button>";
        header("Location: ../pages/edicao-usuario.php?matricula=$matricula");
    }
?>