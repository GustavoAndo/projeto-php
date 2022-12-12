<?php
    include_once("../database/conexao.php");
    session_start();

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
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Usuário atualizado com sucesso!<button class='btn btn-success btn-sm' onClick='fechar()'>X</button></p></div>";
        header("Location: ../pages/tabela-usuario.php");
    } else {
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao atualizar o usuário.</p><button class='btn btn-danger btn-sm' onClick='fechar()'>X</button></p></div>";
        header("Location: ../pages/edicao-usuario.php?matricula=$matricula");
    }
?>