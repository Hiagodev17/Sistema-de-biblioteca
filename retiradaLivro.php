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
    $idLivro = $_POST['idLivro'];
    $nomeLivro = $_POST['nomeLivro'];
    $nomeCliente = $_POST['nomeCliente'];
    $dataRetirada = $_POST['dataRetirada'];
    
    $sql1 = "SELECT * FROM `cliente` where `nome` = '".$nomeCliente."';";
    $resultado1 = $conexao->query($sql1);
    $row1 = $resultado1 -> fetch_array();
    $idCliente = $row1[0];


    $sql = "INSERT INTO retirada (`idCliente`, `nomeCliente`, `idLivro`, `nomeLivro`, `dataRetirada`) 
            VALUES ('".$idCliente."', '".$nomeCliente."' , '".$idLivro."', '".$nomeLivro."' , '".$dataRetirada."');";
    $resultado = $conexao->query($sql);
    

    $conexao->close();
    header('Location: site.php', true, 301);

}

?>