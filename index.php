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
</head>
<body>
    <h1>Controle de Usuários</h1>
<?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }    
?>
    <a href="./pages/cadastro-usuario.php">Cadastrar Usuário</a>
<?php
    if (!empty($row)) {
?>
    <table>
        <tr>
            <td>Nome</td>
            <td>E-mail</td>
            <td>Projeto</td>
            <td colspan="3">Ação</td>
        </tr>
<?php
    do{
?>
        <tr>
            <td><?php echo $row['usu_nome'] ?></td>
            <td><?php echo $row['usu_email'] ?></td>
            <td><?php echo !empty($row['id_projeto']) ? $row['pro_nome'] : "<span>Usuário em nenhum projeto.</span>" ?></td>
            <td> 
                <a href="#">Nova Senha</td>
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
</body>
</html>