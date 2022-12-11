<?php
    include("../database/conexao.php");
    
    $matricula = $_GET['matricula'];
    $sql_code = "SELECT * FROM usuarios WHERE usu_matricula='$matricula'";
    $sql_query= $conn->query($sql_code) or die($mysqli->error);
    $row = $sql_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body>
    <h1>Redefinir Senha</h1>
    <h2>Usuario: <?php echo $row['usu_nome']?></h2>
    <form method="POST" action="../services/atualizar-senha.php">
        <input type="hidden" name="matricula" value="<?php echo $row['usu_matricula'] ?>">
        <label>Nova Senha:</label><br>
        <input type="password" name="senha" placeholder="Digite a senha" required><br><br>
        <input type="submit" value="Redefinir">
    </form>  
    <br>
    <a href="../index.php">Voltar</a>
</body>
</html>