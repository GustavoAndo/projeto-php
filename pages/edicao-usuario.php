<?php
    include("../database/conexao.php");
    
    $matricula = $_GET['matricula'];
    $sql_code_user = "SELECT * FROM usuarios WHERE usu_matricula='$matricula'";
    $sql_query_user= $conn->query($sql_code_user) or die($mysqli->error);
    $row_user = $sql_query_user->fetch_assoc();

    $sql_code_project = "SELECT * FROM projetos";
    $sql_query_project = $conn->query($sql_code_project) or die($mysqli->error);
    $row_project = $sql_query_project->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form method="POST" action="../services/salvar-usuario.php">
        <label>Matricula: </label><br>
        <input type="number" name="matricula" placeholder="Digite a matricula" required disabled value="<?php echo $row_user['usu_matricula'] ?>"><br><br>
        <label>Nome: </label><br>
        <input type="text" name="nome" placeholder="Digite o nome completo" required value="<?php echo $row_user['usu_nome'] ?>"><br><br>
        <label>E-mail:</label><br>
        <input type="email" name="email" placeholder="Digite o e-mail" required value="<?php echo $row_user['usu_email'] ?>"><br><br>
        <label>Projeto:</label><br>
        <select name="projeto" value="<?php echo $row_user['id_projeto'] ?>">
            <option value="">Nenhum</option>
<?php
        do {
            if ($row_project['pro_id'] == $row_user['id_projeto']) {
?>
                <option value="<?php echo $row_project['pro_id']?>" selected ><?php echo $row_project['pro_nome']?></option>
<?php
            } else {
?>         
                <option value="<?php echo $row_project['pro_id']?>"><?php echo $row_project['pro_nome'] ?></option>
<?php
            }
        } while($row_project=$sql_query_project->fetch_assoc());
?>
        </select><br><br>
        <input type="submit" value="Editar">
    </form>  
    <br>
    <a href="../index.php">Voltar</a>
</body>
</html>