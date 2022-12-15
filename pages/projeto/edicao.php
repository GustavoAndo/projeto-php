<?php
    include("../../database/conexao.php");
    
    $id = $_GET['id'];
    $sql_code = "SELECT * FROM projetos WHERE pro_id='$id'";
    $sql_query= $conn->query($sql_code) or die($mysqli->error);
    $row = $sql_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Projeto</title>
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
                            <a class="nav-link" href="../usuario/tabela.php">Usuários</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link" href="./tabela.php">Projetos</a>
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
            <h1 class="text-center">Editar Projeto</h1>
            <form method="POST" action="../../services/projeto/atualizar.php">
                <div class="p-2 row">
                    <div class="col-2">
                        <input type="hidden" name="id" value="<?php echo $row['pro_id'] ?>">
                        <label class="form-label">ID: </label>
                        <input class="form-control" type="number" disabled value="<?php echo $row['pro_id'] ?>">
                    </div>
                    <div class="col-10">
                        <label class="form-label">Nome: </label>
                        <input class="form-control" type="text" name="nome" placeholder="Digite o nome" required value="<?php echo $row['pro_nome'] ?>">
                    </div>
                </div>
                <div class="p-2 row">
                    <div class="col">
                        <label class="form-label">Orçamento:</label>
                        <input class="form-control" type="number" step="0.01" name="orcamento" placeholder="Digite o orçamento" required value="<?php echo $row['pro_orcamento'] ?>">  
                    </div>
                    <div class="col">
                        <label class="form-label">Data de início:</label>
                        <input class="form-control" type="date" name="datainicio" required value="<?php echo $row['pro_data_inicio'] ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Data de término:</label>
                        <input class="form-control" type="date" name="datafim" required value="<?php echo $row['pro_data_fim'] ?>">
                    </div>
                </div>
                <div class="p-2">
                    <label class="form-label">Descrição:</label>
                    <textarea class="form-control" name="descricao"><?php echo $row['pro_descricao'] ?></textarea>
                </div>
                </div>
                <div class="d-flex justify-content-center p-2 mt-2">
                    <input class="btn btn-primary" type="submit" value="Editar">
                </div>
            </form>  
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>