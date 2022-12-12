<?php
    include("../database/conexao.php");
    
    $matricula = $_GET['matricula'];
    $sql_code_user = "SELECT * FROM usuarios WHERE usu_matricula='$matricula'";
    $sql_query_user= $conn->query($sql_code_user) or die($mysqli->error);
    $row_user = $sql_query_user->fetch_assoc();

    $sql_code_project = "SELECT * FROM projetos";
    $sql_query_project = $conn->query($sql_code_project) or die($mysqli->error);
    $row_project = $sql_query_project->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./styles/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container px-5 pt-2 my-3">
        <a class="btn btn-secondary" href="../index.php">Voltar</a>
        <h1 class="text-center">Editar Usuário</h1>
        <form method="POST" action="../services/atualizar-usuario.php">
            <div class="form-group p-2">
                <label>Matricula: </label>
                <input type="hidden" name="matricula"  value="<?php echo $row_user['usu_matricula'] ?>">
                <input class="form-control mt-1" type="number" placeholder="Digite a matricula" required disabled value="<?php echo $row_user['usu_matricula'] ?>">
            </div>
            <div class="form-group p-2">
                <label>Nome: </label>
                <input class="form-control mt-1" type="text" name="nome" placeholder="Digite o nome completo" required value="<?php echo $row_user['usu_nome'] ?>">
            </div>
            <div class="form-group p-2">
                <label>E-mail:</label>
                <input class="form-control mt-1" type="email" name="email" placeholder="Digite o e-mail" required value="<?php echo $row_user['usu_email'] ?>">
            </div>
            <div class="form-group p-2">
            <label>Projeto:</label>
                <select class="form-control mt-1" name="projeto" value="<?php echo $row_user['id_projeto'] ?>">
                    <option value="">Nenhum</option>
        <?php
                do {
                    if ($row_project['pro_id'] == $row_user['id_projeto']) {
        ?>
                        <option value="<?php echo $row_project['pro_id']?>" selected ><?php echo $row_project['pro_nome']?></option>
        <?php
                    } else {
        ?>         
                        <option value="<?php echo $row_project['pro_id']?>"><?php echo $row_project['pro_nome'] ?></option>
        <?php
                    }
                } while($row_project=$sql_query_project->fetch_assoc());
        ?>
                </select>
            </div>
            <div class="d-flex justify-content-center p-2 mt-2">
                <input class="btn btn-primary" type="submit" value="Editar">
            </div>
        </form>  
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>