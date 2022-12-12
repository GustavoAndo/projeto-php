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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./styles/styles.css" rel="stylesheet">
    <title>Redefinir Senha</title>
</head>
<body>
    <div class="container px-5 pt-2 my-3">
        <a class="btn btn-secondary" href="../index.php">Voltar</a>
        <h1 class="text-center">Redefinir Senha</h1>
        <h2 class="text-center mt-3 h4">Usuário: <?php echo $row['usu_nome']?></h2>
        <form method="POST" action="../services/atualizar-senha.php">
            <div class="form-group p-2">
                <input type="hidden" name="matricula" value="<?php echo $row['usu_matricula'] ?>">
                <label>Nova Senha:</label>
                <input class="form-control mt-1" type="password" name="senha" placeholder="Digite a senha" required>
            </div>
            <div class="d-flex justify-content-center p-2 mt-2">
                <input class="btn btn-primary" type="submit" value="Redefinir">
            </div>
        </form>  
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>