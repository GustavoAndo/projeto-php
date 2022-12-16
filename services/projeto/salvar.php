<?php
    include_once("../../database/conexao.php");
    session_start();

    $nome = trim($_POST['nome']);
    $orcamento = $_POST['orcamento'];
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datafim'];
    $descricao = trim($_POST['descricao']);

    $error = false;
    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    $tagStartError = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>";
    $tagEndError = "<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";

    if (empty($nome) || empty($orcamento) || empty($datainicio) || empty($datafim)) {
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

        $result = "INSERT INTO projetos (pro_nome, pro_orcamento, pro_data_inicio, pro_data_fim, pro_descricao) VALUES ( '$nome', '$orcamento', '$datainicio', '$datafim',";

        if (empty($descricao)){
            $result = $result . "NULL)";
        } else {
            $result = $result . "'$descricao')";
        }

        $resultado = mysqli_query($conn, $result);

        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Projeto cadastrado com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/projeto/tabela.php");
        } else {
            $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao cadastrar projeto.<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
            header("Location: ../../pages/projeto/cadastro.php");
        }

    } else {

        $_SESSION['nome'] = $nome;
        $_SESSION['orcamento'] = $orcamento;
        $_SESSION['datainicio'] = $datainicio;
        $_SESSION['datafim'] = $datafim;
        $_SESSION['descricao'] = $descricao;
        header("Location: ../../pages/projeto/cadastro.php");

    }
?>