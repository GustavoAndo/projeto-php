<?php
    include_once("../../database/conexao.php");
    include_once('../../services/login/protecao.php');

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
                    <a class="navbar-brand" href="../../">PROJETO PHP</a>
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
                            <a class="nav-link" href="../../services/login/deslogar">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="pt-5 mt-3">
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }    
        ?>
        <div class="container px-5 mt-4 mb-1">
            <h1 class="text-center">Cadastrar Usuário</h1>
            <form method="POST" action="../../services/usuario/salvar.php">
                <div class="row p-2">
                    <div class="col-2">
                        <label class="form-label">Matricula: </label>
                        <input class="form-control" type="number" name="matricula" placeholder="Matricula" 
                        <?php
                            if(isset($_SESSION['matricula'])){
                                echo "value=" . $_SESSION['matricula'];
                                unset($_SESSION['matricula']);
                            }    
                        ?>>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Nome: </label>
                        <input class="form-control" type="text" name="nome" placeholder="Digite o nome completo"
                        <?php
                            if(isset($_SESSION['nome'])){
                                echo "value='" . $_SESSION['nome'] . "'";
                                unset($_SESSION['nome']);
                            }    
                        ?>>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Projeto:</label>
                        <select class="form-select" name="projeto">
                            <option value="">Nenhum</option>
                    <?php
                        do {
                            if(isset($_SESSION['projeto'])){
                                if ($_SESSION['projeto'] == $row['pro_id']) {
                    ?>
                                    <option value="<?php echo $row['pro_id']?>" selected><?php echo $row['pro_nome'] ?></option>
                    <?php               
                                } else {
                    ?>
                                    <option value="<?php echo $row['pro_id']?>"><?php echo $row['pro_nome'] ?></option>
                    <?php
                                }
                            } else {
                    ?>
                                <option value="<?php echo $row['pro_id']?>"><?php echo $row['pro_nome'] ?></option>
                    <?php
                            }
                        } while($row=$sql_query->fetch_assoc());
                        if(isset($_SESSION['projeto'])) {
                            unset($_SESSION['projeto']);
                        }
                    ?>
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col">
                        <label class="form-label">E-mail:</label>
                        <input class="form-control" type="email" name="email" placeholder="Digite o e-mail"
                        <?php
                            if(isset($_SESSION['email'])){
                                echo "value='" . $_SESSION['email'] . "'";
                                unset($_SESSION['email']);
                            }    
                        ?>>
                    </div>
                    <div class="col">
                        <label class="form-label">Senha:</label>
                        <input class="form-control" type="password" name="senha" placeholder="Digite a senha"
                        <?php
                            if(isset($_SESSION['senha'])){
                                echo "value=" . $_SESSION['senha'];
                                unset($_SESSION['senha']);
                            }    
                        ?>>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-2 mt-4">
                    <input class="btn btn-primary" type="submit" value="Cadastrar">
                </div>
            </form>  
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>