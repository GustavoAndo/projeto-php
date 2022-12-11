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
        $_SESSION['msg'] = "<p id='aviso'>Usuário atualizado com sucesso!<button onClick='fechar()'>X</button></p>";
        header("Location: ../index.php");
    } else {
        $_SESSION['msg'] = "<p>Erro ao atualizar o usuário.</p><button onClick='fechar()'>X</button>";
        header("Location: ../pages/edicao-usuario.php?matricula=$matricula");
    }
?>