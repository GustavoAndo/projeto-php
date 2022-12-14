<?php
    include("../../database/conexao.php");
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
    <link href="../../styles/styles.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="../../">CRUD PHP</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item p-1">
                            <a class="nav-link" aria-current="page" href="../../">Home</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link" href="./tabela.php">Usuários</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link" href="../projeto/tabela.php">Projetos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item p-1">
                            <a class="nav-link" href="#">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container px-5 pt-5 mt-5 mb-1">
            <h1 class="text-center">Cadastrar Usuário</h1>
            <form method="POST" action="../../services/usuario/salvar.php">
                <div class="row p-2">
                    <div class="col-2">
                        <label class="form-label">Matricula: </label>
                        <input class="form-control" type="number" name="matricula" placeholder="Matricula" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Nome: </label>
                        <input class="form-control" type="text" name="nome" placeholder="Digite o nome completo" required>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Projeto:</label>
                        <select class="form-select" name="projeto">
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
                </div>
                <div class="row p-2">
                    <div class="col">
                        <label class="form-label">E-mail:</label>
                        <input class="form-control" type="email" name="email" placeholder="Digite o e-mail" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Senha:</label>
                        <input class="form-control" type="password" name="senha" placeholder="Digite a senha" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-2 mt-4">
                    <input class="btn btn-primary" type="submit" value="Cadastrar">
                </div>
            </form>  
        </div>
    </section>
</body>
</html>