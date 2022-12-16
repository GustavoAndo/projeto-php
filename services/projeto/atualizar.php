<?php
    include_once("../../database/conexao.php");
    session_start();

    $id = $_POST['id'];
    $nome = trim($_POST['nome']);
    $orcamento = $_POST['orcamento'];
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datafim'];
    $descricao = trim($_POST['descricao']);

    if(empty($descricao)){
        $descricao = NULL;
    }

    $error = false;
    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    $tagStartError = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>";
    $tagEndError = "<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";

    $result_start = "SELECT * FROM projetos WHERE pro_id='$id'";
    $resultado_start = mysqli_query($conn, $result_start);
    $row_start = $resultado_start->fetch_assoc();

    if ($row_start['pro_nome'] == $nome && $row_start['pro_orcamento'] == $orcamento && $row_start['pro_data_inicio'] == $datainicio && $row_start['pro_data_fim'] == $datafim && $row_start['pro_descricao'] == $descricao) {  
        $error = true;
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-warning mr-2'>Não houve nenhuma alteração nos dados do projeto.<button class='btn btn-warning btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/usuario/tabela.php");
    } elseif (empty($nome) || empty($orcamento) || empty($datainicio) || empty($datafim)) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "Preencha todos os campos! (Apenas a descrição não é obrigatório.)" . $tagEndError;
    } elseif($orcamento < 0) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "Valor inválido de orçamento! Não pode ser um valor negativo." . $tagEndError;
    } elseif($datainicio > $datafim) {
        $error = true;
        $_SESSION['msg'] = $tagStartError . "A data de início deve ser anterior a data de fim." . $tagEndError;
    }

    if (!$error) {

        if (empty($descricao)) {
            $result = "UPDATE projetos SET pro_nome='$nome', pro_orcamento='$orcamento', pro_data_inicio='$datainicio', pro_data_fim='$datafim', pro_descricao=NULL WHERE pro_id = '$id'";
        } else {
            $result = "UPDATE projetos SET pro_nome='$nome', pro_orcamento='$orcamento', pro_data_inicio='$datainicio', pro_data_fim='$datafim', pro_descricao='$descricao' WHERE pro_id = '$id'";  
        }


        $resultado = mysqli_query($conn, $result);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Projeto cadastrado com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/projeto/tabela.php");
        } else {
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao cadastrar projeto.<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/projeto/edicao.php?id=$id");
        }

    } else {

        $_SESSION['nome'] = $nome;
        $_SESSION['orcamento'] = $orcamento;
        $_SESSION['datainicio'] = $datainicio;
        $_SESSION['datafim'] = $datafim;
        $_SESSION['descricao'] = $descricao;
        header("Location: ../../pages/projeto/edicao.php?id=$id");

    }
?>