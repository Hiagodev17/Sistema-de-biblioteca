<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Cliente</title>
</head>
<body>
    <?php
    session_start();

    $idLivro = $_POST['idLivro'];
    $nomeLivro = $_POST['nomeLivro'];
    
    echo '<form method="post" action="retiradaLivro.php">
        <input type="hidden" value="'.$idLivro.'" name="idLivro" size="20"><br>
        <input type="hidden" value="'.$nomeLivro.'" name="nomeLivro" size="20"><br>
        
        <label>>Nome do cliente: </label>
        <input type="text" name="nomeCliente" size="20"><br><br>
        <label>>Data de Retirada: (Ano/Mês/Dia)</label>
        <input type="text" name="dataRetirada" size="20"><br><br>
        <input type="submit" value="RETIRAR">';

    echo '</form>'

    ?>
</body>
</html>