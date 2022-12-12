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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="./">CRUD PHP</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item p-1">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link" href="./pages/tabela-usuario.php">Usuários</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link" href="./pages/tabela-projeto.php">Projetos</a>
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
    <div class="container px-5 pt-5 mt-5 mb-3">
        <h1 class="text-center">Home</h1>
        <h2>Bem-vindo!</h2>
        <p>O que você deseja?</p>
        <ul>
            <li><a href="./pages/tabela-usuario">Página de Usuários</a></li>
            <li><a href="./pages/tabela-projeto">Página de Projetos</a></li>
        </ul>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>