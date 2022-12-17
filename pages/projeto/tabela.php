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
    <title>Projetos</title>
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
                            <a class="nav-link" href="../usuario/tabela.php">Usuários</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link active" href="./tabela.php">Projetos</a>
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
            <h1 class="text-center">Controle de Projetos</h1>
            <div class="d-flex justify-content-center my-3">
                <a class="btn btn-primary" href="./cadastro.php">Cadastrar Projeto</a>
            </div>
        <?php
            if (!empty($row)) {
        ?>
            <table class="mt-4 my-3 table table-striped">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Orçamento</th>
                    <th scope="col">Data Início</th>
                    <th scope="col">Data Fim</th>
                    <th scope="col" colspan="3">Ação</th>
                </tr>
        <?php
            do{
        ?>
                <tr>
                    <th scope="row"><?php echo $row['pro_id'] ?></th>
                    <td><?php echo $row['pro_nome'] ?></td>
                    <td><?php echo $row['pro_orcamento'] ?></td>
                    <td><?php              
                        $data = explode("-",$row['pro_data_inicio']) ;
                        echo "$data[2]/$data[1]/$data[0]"; 
                    ?></td>
                    <td><?php              
                        $data = explode("-",$row['pro_data_fim']) ;
                        echo "$data[2]/$data[1]/$data[0]"; 
                    ?></td>
                    <td>
                      <button class="btn btn-success btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample<?php echo $row['pro_id'] ?>" aria-expanded="false" aria-controls="multiCollapseExample<?php echo $row['pro_id'] ?>">Informações</button>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm " href="./edicao.php?id=<?php echo $row['pro_id'] ?>">Editar</a>
                    </td>
                    <td>
                        <!-- Botao que ativa o modal -->
                        <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#modalExcluir<?php echo $row['pro_id'] ?>">
                            Excluir
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalExcluir<?php echo $row['pro_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $row['pro_id'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel<?php echo $row['pro_id'] ?>">EXCLUIR PROJETO</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir o projeto <?php echo $row['pro_nome'] ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="../../services/projeto/excluir.php?id=<?php echo $row['pro_id']?>" class="btn btn-danger">Excluir</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
                <tr class="collapse multi-collapse" id="multiCollapseExample<?php echo $row['pro_id'] ?>">
                    <td colspan="5">
                        <div class="card card-body">
                            <p><strong>Descrição: </strong><?php echo !empty($row['pro_descricao']) ? $row['pro_descricao'] : "<em>Projeto sem descrição.</em>"?></p>
                        </div>
                    </td>
                    <td colspan="3">
                        <div class="card card-body">
                            <p><strong>Usuarios no projeto: </strong>
                            <?php 
                                $project = $row['pro_id'];
                                $sql_code_user = "SELECT * FROM usuarios WHERE id_projeto='$project'";
                                $sql_query_user = $conn->query($sql_code_user) or die($mysqli->error);
                                $row_user = $sql_query_user->fetch_assoc();

                                if (!empty($row_user)) {
                                    do {
                                        echo "<br>" . $row_user['usu_nome'];
                                    } while($row_user=$sql_query_user->fetch_assoc());
                                } else {
                                    echo "<br>Não há usuários neste projeto";
                                }
                            ?>   
                        </div>
                    </td>
                </tr>      
        <?php
            } while($row=$sql_query->fetch_assoc());
        ?>            
            </table>
        <?php
            } else {
                echo "<p>Ainda não há projetos cadastrados.</p>";
            } 
        ?>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>