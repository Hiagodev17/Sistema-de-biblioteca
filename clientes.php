<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cliente</title>
</head>
<body>
    <?php
    session_start();

    $hostname = "127.0.0.1";
    $user = "root";
    $password = "root";
    $database = "biblioteca";

    $conexao = new mysqli($hostname, $user, $password, $database);

    if($conexao->connect_errno) {
        echo "Failed to connect to MySQL: " . $conexao->connect_error;
        exit();
    } else{
        $nomeCliente = $_POST['nomeCliente'];
    
    $sql="SELECT * FROM `biblioteca`.`retirada` where `nomeCliente` = '".$nomeCliente."';";
                 
			$resultado = $conexao->query($sql);
			
			echo '<hr>';
			while($row = mysqli_fetch_array($resultado)){
                echo "<hr>";
                echo 'ID do Livro: ';
				echo $row[2];
				echo '<br>';
				echo 'Nome do Livro: ';
				echo $row[3];
				echo '<br>';
                
            };
			echo "<br>";
		    echo "<a href='site.php' class='sair'>Sair</a>";
			$conexao -> close();
}
    ?>
</body>
</html>