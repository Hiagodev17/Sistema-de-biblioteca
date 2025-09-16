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
    $idRetirada = $conexao->real_escape_string($_POST['idRetirada']);


    $sql = "DELETE FROM `retirada` WHERE `retirada`.`idRetirada` = '".$idRetirada."';";
    $resultado = $conexao->query($sql);

    $conexao->close();
    header('Location: site.php', true, 301);

}

?>