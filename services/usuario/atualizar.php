<?php
    include_once("../../database/conexao.php");
    session_start();

    $matricula = $_POST['matricula'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $projeto = $_POST['projeto'];

    $error = false;
    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    $tagStartError = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>";
    $tagEndError = "<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";

    $result_start = "SELECT * FROM usuarios WHERE usu_matricula='$matricula'";
    $resultado_start = mysqli_query($conn, $result_start);
    $row_start = $resultado_start->fetch_assoc();

    if ($row_start['usu_nome'] == $nome && $row_start['usu_email'] == $email && $row_start['id_projeto'] == $projeto) {  
        $error = true;
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-warning mr-2'>Não houve nenhuma alteração nos dados do usuário.<button class='btn btn-warning btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/usuario/tabela.php");
    } elseif (empty($nome) || empty($email)) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "Preencha todos os campos!" . $tagEndError;
    } else {
        $result = "SELECT * FROM usuarios WHERE usu_email='$email'";
        $resultado=  mysqli_query($conn, $result);
        $row = $resultado->fetch_assoc();
        if ($resultado && $resultado->num_rows != 0) {
            if ($row['usu_email'] != $row_start['usu_email']) {
                $error = true;
                $_SESSION['msg'] = $tagStartError . "Já existe um usuário utilizando este email." . $tagEndError; 
            }
        }
    }

    if (!$error) {

        if (empty($projeto)) {
            $result = "UPDATE usuarios SET usu_nome='$nome', usu_email='$email', id_projeto=NULL WHERE usu_matricula='$matricula'";
        } else {
            $result = "UPDATE usuarios SET usu_nome='$nome', usu_email='$email', id_projeto='$projeto' WHERE usu_matricula='$matricula'"; 
        }

        $resultado = mysqli_query($conn, $result);

        $function = '(() => document.getElementById("aviso").innerHTML = "")()';
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Usuário atualizado com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/usuario/tabela.php");
        } else {
            $_SESSION['msg'] = $tagStartError . "Erro ao atualizar o usuário." . $tagEndError;
            header("Location: ../../pages/usuario/edicao.php?matricula=$matricula");
        }
    
    } else {

        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['projeto'] = $projeto;
        header("Location: ../../pages/usuario/edicao.php?matricula=$matricula");

    }

?>