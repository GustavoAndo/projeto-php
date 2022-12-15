<?php
    include_once("../../database/conexao.php");
    session_start();

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $orcamento = $_POST['orcamento'];
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datafim'];
    $descricao = $_POST['descricao'];

    $result = "UPDATE projetos SET pro_nome='$nome', pro_orcamento='$orcamento', pro_data_inicio='$datainicio', pro_data_fim='$datafim', pro_descricao='$descricao' WHERE pro_id = '$id'";

    $resultado = mysqli_query($conn, $result);

    $function = '(() => document.getElementById("aviso").innerHTML = "")()';
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Projeto cadastrado com sucesso!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/projeto/tabela.php");
    } else {
        $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-danger text-white mr-2'>Erro ao cadastrar projeto.<button class='btn btn-danger btn-sm' onClick='$function'>X</button></p></div>";
        header("Location: ../../pages/projeto/edicao.php?id=$id");
    }
?>