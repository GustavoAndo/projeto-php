<?php
    include_once("../../database/conexao.php");
    session_start();

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

    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Usuário cadastrado com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/usuario/tabela.php");
    } else {
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao cadastrar usuário.<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/usuario/cadastro.php");
    }
?>