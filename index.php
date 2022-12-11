<?php
    include("./database/conexao.php");
    session_start();

    $sql_code = "SELECT * FROM usuarios LEFT JOIN projetos ON usuarios.id_projeto = projetos.pro_id ORDER BY usuarios.usu_nome";
    $sql_query = $conn->query($sql_code) or die($mysqli->error);
    $row = $sql_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./styles/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container px-5 pt-4 my-3">
        <h1 class="text-center">Controle de Usuários</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }    
    ?>
    <div class="d-flex justify-content-center my-3">
        <a class="btn btn-primary" href="./pages/cadastro-usuario.php">Cadastrar Usuário</a>
    </div>
    <?php
        if (!empty($row)) {
    ?>
        <table class="mt-4 my-3 table table-striped">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Projeto</th>
                <th scope="col" colspan="3">Ação</th>
            </tr>
    <?php
        do{
    ?>
            <tr>
                <td><?php echo $row['usu_nome'] ?></td>
                <td><?php echo $row['usu_email'] ?></td>
                <td><?php echo !empty($row['id_projeto']) ? $row['pro_nome'] : "<span>Usuário em nenhum projeto.</span>" ?></td>
                <td> 
                    <a href="./pages/redefinicao-senha.php?matricula=<?php echo $row['usu_matricula'] ?>">Nova Senha</td>
                </td>
                <td>
                    <a href="./pages/edicao-usuario.php?matricula=<?php echo $row['usu_matricula'] ?>">Editar</a>
                </td>
                <td>
                    <a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $row['usu_nome'] ?>?')) 
                    location.href='./services/excluir-usuario.php?matricula=<?php echo $row['usu_matricula'] ?>';">Excluir</a>
                </td>
            </tr>       
    <?php
        } while($row=$sql_query->fetch_assoc());
    ?>            
        </table>
    <?php
        } else {
            echo "<p>Ainda não há usuários cadastrados.</p>";
        } 
    ?>
    </div>
<script>
    function fechar() {
        document.getElementById("aviso").innerHTML = '';
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>