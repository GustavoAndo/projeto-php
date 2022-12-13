<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Projeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../styles/styles.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="../../">CRUD PHP</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item p-1">
                        <a class="nav-link" aria-current="page" href="../../">Home</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link" href="./usuario/tabela.php">Usuários</a>
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
    <div class="container px-5 pt-5 mt-5 mb-1">
        <h1 class="text-center">Cadastrar Projeto</h1>
        <form method="POST" action="../../services/projeto/salvar.php">
            <div class="form-group p-2">
                <label>Nome: </label>
                <input class="form-control mt-1" type="text" name="nome" placeholder="Digite o nome" required>
            </div>
            <div class="form-group p-2">
                <label>Orçamento:</label>
                <input class="form-control mt-1" type="number" step="0.01" name="orcamento" placeholder="Digite o orçamento" required>
            </div>
            <div class="form-group p-2">
                <label>Data de início:</label>
                <input class="form-control mt-1" type="date" name="datainicio" required>
            </div>
            <div class="form-group p-2">
                <label>Data de término:</label>
                <input class="form-control mt-1" type="date" name="datafim" required>
            </div>
            <div class="form-group p-2">
                <label>Descrição:</label>
                <textarea class="form-control mt-1" name="descricao"></textarea>
            </div>
            </div>
            <div class="d-flex justify-content-center p-2 mt-2">
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </div>
        </form>  
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>