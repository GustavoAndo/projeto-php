<?php
    include_once('./services/login/protecao.php');
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="./">PROJETO PHP</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item p-1">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link" href="./pages/usuario/tabela.php">Usuários</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link" href="./pages/projeto/tabela.php">Projetos</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item p-1">
                        <a class="nav-link" href="./services/login/deslogar.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container px-5 pt-5 mt-5 mb-3">
        <h1 class="text-center">Home</h1>
        <h3 class="pb-3">Bem-vindo, <?php echo $_SESSION['login_nome'] ?>!</h3>
        <p>Informações do usuário:</p>
        <ul>
            <li><strong>Nome: </strong><?php echo $_SESSION['login_nome'] ?></li>
            <li><strong>Matrícula: </strong><?php echo $_SESSION['login_matricula'] ?></li>
            <li><strong>Email: </strong><?php echo $_SESSION['login_email'] ?></li>
            <li><strong>Projeto Atual: </strong><?php echo $_SESSION['login_projeto'] ?></li>
        </ul>
        <p>O que você deseja acessar?</p>
        <ul>
            <li><a href="./pages/usuario/tabela.php">Página de Usuários</a></li>
            <li><a href="./pages/projeto/tabela.php">Página de Projetos</a></li>
        </ul>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>