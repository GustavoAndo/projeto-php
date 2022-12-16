<?php
    include_once('../../database/conexao.php');
    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $error = false;

    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    $tagStartError = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>";
    $tagEndError = "<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";

    if(!empty($email) && !empty($senha)){
        $result = "SELECT usu_matricula, usu_nome, usu_email, usu_senha, id_projeto FROM usuarios WHERE usu_email = '$email'";
        $resultado = mysqli_query($conn, $result);
        $row = mysqli_fetch_assoc($resultado);
        if ($row['usu_matricula']){   
            if(password_verify($senha, $row['usu_senha'])){
                $_SESSION['login_matricula'] = $row['usu_matricula'];
                $_SESSION['login_nome'] = $row['usu_nome'];
                $_SESSION['login_email'] = $row['usu_email'];
                $_SESSION['login_projeto'] = $row['id_projeto'];
            } else {
                $_SESSION['msg'] = $tagStartError . "Senha incorreta!" . $tagEndError;
                $error = true;
            }
        } else {
            $_SESSION['msg'] = $tagStartError . "Email inválido!" . $tagEndError;
            $error = true;
        }
    } else {
        $_SESSION['msg'] = $tagStartError . "Preencha o email e a senha!" . $tagEndError;
        $error = true;
    }

    if (!$error) {
        header('location: ../../');
    } else {
        $_SESSION['email'] = $email;
        header('location: ../../pages/login/login.php');
    }
?>