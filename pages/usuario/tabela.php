<?php
    include("../../database/conexao.php");
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
                            <a class="nav-link active" href="./tabela.php">Usuários</a>
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

    <section class="pt-5 mt-3">
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }    
    ?>
        <div class="container px-5 mt-4 mb-1">
            <h1 class="text-center">Controle de Usuários</h1>
            <div class="d-flex justify-content-center my-3">
                <a class="btn btn-primary" href="./cadastro.php">Cadastrar Usuário</a>
            </div>
        <?php
            if (!empty($row)) {
        ?>
            <table class="mt-4 my-3 table table-striped">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Projeto</th>
                    <th scope="col" colspan="3">Ação</th>
                </tr>
        <?php
            do{
        ?>
                <tr>
                    <td><?php echo $row['usu_nome'] ?></td>
                    <td><?php echo $row['usu_email'] ?></td>
                    <td><?php echo !empty($row['id_projeto']) ? $row['pro_nome'] : "<span>Usuário em nenhum projeto.</span>" ?></td>
                    <td> 
                        <a class="btn btn-success btn-sm " href="./redefinicao-senha.php?matricula=<?php echo $row['usu_matricula'] ?>">Nova Senha</td>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm " href="./edicao.php?matricula=<?php echo $row['usu_matricula'] ?>">Editar</a>
                    </td>
                    <td>
                        <!-- Botao que ativa o modal -->
                        <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#modalExcluir<?php echo $row['usu_matricula'] ?>">
                            Excluir
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalExcluir<?php echo $row['usu_matricula'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $row['usu_matricula'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel<?php echo $row['usu_matricula'] ?>">EXCLUIR USUÁRIO</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja deletar o usuário <?php echo $row['usu_nome'] ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="../../services/usuario/excluir.php?matricula=<?php echo $row['usu_matricula']?>" class="btn btn-danger">Excluir</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>       
        <?php
            } while($row=$sql_query->fetch_assoc());
        ?>            
            </table>
        <?php
            } else {
                echo "<p>Ainda não há usuários cadastrados.</p>";
            } 
        ?>
        </div>
    </section>

<script>
    function fechar() {
        document.getElementById("aviso").innerHTML = '';
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>