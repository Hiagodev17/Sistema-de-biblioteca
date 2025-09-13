<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Cliente</title>
</head>
<body>
    <form method="post" action="cadastrarBanco.php">
        <label>>Nome: </label>
        <input type="text" name="nome" size="20"><br>
        <label>>Endereço</label>
        <input type="text" name="endereco" size="20"><br>
        <label>>Cidade</label>
        <input type="text" name="cidade" size="20"><br>
        <label>>Estado</label>
        <input type="text" name="estado" size="20"><br>
        <label>>Telefone</label>
        <input type="number" name="telefone" size="20"><br>

        <input type="submit" value="CADASTRAR">
    </form>
</body>
</html>