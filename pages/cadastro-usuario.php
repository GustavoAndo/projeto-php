<?php
    include("../database/conexao.php");
    $sql_code = "SELECT * FROM projetos";
    $sql_query = $conn->query($sql_code) or die($mysqli->error);
    $row = $sql_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./styles/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container px-5 pt-4 my-3">
        <a class="btn btn-secondary" href="../index.php">Voltar</a>
        <h1 class="text-center">Cadastrar Usuário</h1>
        <form method="POST" action="../services/salvar-usuario.php">
            <div class="form-group p-2">
                <label>Matricula: </label>
                <div class="d-flex justify-content-center">
                <input class="form-control" type="number" name="matricula" placeholder="Digite a matricula" required>
                </div>
            </div>
            <div class="form-group p-2">
                <label>Nome: </label>
                <input class="form-control" type="text" name="nome" placeholder="Digite o nome completo" required>
            </div>
            <div class="form-group p-2">
                <label>E-mail:</label>
                <input class="form-control" type="email" name="email" placeholder="Digite o e-mail" required>
            </div>
            <div class="form-group p-2">
                <label>Senha:</label>
                <input class="form-control" type="password" name="senha" placeholder="Digite a senha" required>
            </div>
            <div class="form-group p-2">
                <label>Projeto:</label>
                <select class="form-control" name="projeto">
                    <option value="">Nenhum</option>
            <?php
                do {
            ?>
                    <option value="<?php echo $row['pro_id']?>"><?php echo $row['pro_nome'] ?></option>
            <?php
                } while($row=$sql_query->fetch_assoc());
            ?>
                </select>
            </div>
            <div class="d-flex justify-content-center p-2 mt-2">
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </div>
        </form>  
        <br>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>