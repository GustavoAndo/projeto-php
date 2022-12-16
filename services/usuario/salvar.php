<?php
    include_once("../../database/conexao.php");
    session_start();

    $matricula = $_POST['matricula'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha =  $_POST['senha'];
    $projeto = $_POST['projeto'];

    $error = false;
    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    $tagStartError = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>";
    $tagEndError = "<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";

    if (empty($matricula) || empty($nome) || empty($email) || empty($senha)) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "Preencha todos os campos!" . $tagEndError;
    } elseif(strlen(strval($matricula)) < 5 || $matricula < 0) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "Valor inválido de matrícula! Deve conter 5 digitos ou mais e não pode ser um valor negativo." . $tagEndError;
    } elseif(strlen($senha) < 8) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "A senha deve conter pelo menos 8 caracteres." . $tagEndError;
    } else {
        $result_matricula = "SELECT * FROM usuarios WHERE usu_matricula='$matricula'";
        $resultado_matricula = mysqli_query($conn, $result_matricula);
        if ($resultado_matricula && $resultado_matricula->num_rows != 0) {
            $error = true;
            $_SESSION['msg'] = $tagStartError . "Já existe um usuário utilizando esta matrícula." . $tagEndError; 
        } else {
            $result_email = "SELECT * FROM usuarios WHERE usu_email='$email'";
            $resultado_email = mysqli_query($conn, $result_email);
            if ($resultado_email && $resultado_email->num_rows != 0) {
                $error = true;
                $_SESSION['msg'] = $tagStartError . "Já existe um usuário utilizando este email." . $tagEndError; 
            }
        }
    }

    if (!$error) {
        
        $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
        if (empty($projeto)) {
            $result = "INSERT INTO usuarios (usu_matricula, usu_nome, usu_email, usu_senha) VALUES ('$matricula', '$nome', '$email', '$senha')";
        } else {
            $result = "INSERT INTO usuarios (usu_matricula, usu_nome, usu_email, usu_senha, id_projeto) VALUES ('$matricula', '$nome', '$email', '$senhaCript' ,'$projeto')"; 
        }
    
        $resultado = mysqli_query($conn, $result);
    
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Usuário cadastrado com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/usuario/tabela.php");
        } else {
            $_SESSION['msg'] = $tagStartError . "Erro ao cadastrar usuário." . $tagEndError;
            header("Location: ../../pages/usuario/cadastro.php");
        }

    } else {

        $_SESSION['matricula'] = $matricula;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['projeto'] = $projeto;
        header("Location: ../../pages/usuario/cadastro.php");

    }

?>