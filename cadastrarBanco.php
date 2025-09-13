<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "biblioteca";

$conexao = new mysqli($hostname, $user, $password, $database);

if($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else{
    // Evita caracteres especiais (SQL Inject)
    $nome = $conexao->real_escape_string($_POST['nome']);
    $endereco = $conexao->real_escape_string($_POST['endereco']);
    $cidade = $conexao->real_escape_string($_POST['cidade']);
    $estado = $conexao->real_escape_string($_POST['estado']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);


    $sql = "INSERT INTO cliente (`nome`, `endereco`, `cidade`, `estado`, `telefone`, `status`) 
            VALUES ('".$nome."', '".$endereco."' , '".$cidade."', '".$estado."', '".$telefone."', 's');";
    $resultado = $conexao->query($sql);

    $conexao->close();
    header('Location: index.php', true, 301);

}

?>