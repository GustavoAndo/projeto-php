<?php
    include_once("../../database/conexao.php");
    session_start();

    $nome = $_POST['nome'];
    $orcamento = $_POST['orcamento'];
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datafim'];
    $descricao = $_POST['descricao'];

    $result = "INSERT INTO projetos (pro_nome, pro_orcamento, pro_data_inicio, pro_data_fim, pro_descricao) VALUES ( '$nome', '$orcamento', '$datainicio', '$datafim', '$descricao')";

    $resultado = mysqli_query($conn, $result);

    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Projeto cadastrado com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/projeto/tabela.php");
    } else {
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao cadastrar projeto.<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/projeto/cadastro.php");
    }
?>