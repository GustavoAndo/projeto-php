<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../styles/styles.css" rel="stylesheet">
    <title>Redefinir Senha</title>
</head>
<body>
    <section>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }    
        ?>
        <div class="container px-5 mt-5 p-5 mb-1">
            <h1 class="text-center">Login</h1>
            <form method="POST" action="../../services/login/logar.php">
                <div class="p-2">
                    <label class="form-label">Email:</label>
                    <input class="form-control" type="email" name="email" placeholder="Digite seu email" <?php if(isset($_SESSION['email'])){echo "value='" . $_SESSION['email'] . "'"; unset($_SESSION['email']);}?>>
                </div>
                <div class="p-2">
                    <label class="form-label">Senha:</label>
                    <input class="form-control" type="password" name="senha" placeholder="Digite sua senha">
                </div>
                <div class="d-flex justify-content-center p-2 mt-2">
                    <input class="btn btn-primary" type="submit" value="Entrar">
                </div>
            </form>  
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>