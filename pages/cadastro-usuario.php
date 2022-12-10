<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form method="POST" action="../services/salvar-usuario.php">
        <label>Matricula: </label><br>
        <input type="number" name="matricula" placeholder="Digite a matricula" required><br><br>
        <label>Nome: </label><br>
        <input type="text" name="nome" placeholder="Digite o nome completo" required><br><br>
        <label>E-mail:</label><br>
        <input type="email" name="email" placeholder="Digite o e-mail" required><br><br>
        <label>Senha:</label><br>
        <input type="password" name="senha" placeholder="Digite a senha" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>  
    <br>
    <a href="../index.php">Voltar</a>
</body>
</html>