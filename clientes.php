<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cliente</title>
</head>
<style>
table {
    border-collapse: collapse;
    width: 60%;
    margin: 20px auto;
}
th, td {
    border: 1px solid #888;
    padding: 8px;
    text-align: left;
}
th {
    background-color: #eee;
}
tr:nth-child(even) {
    background-color: #f9f9f9;
}
</style>
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
            echo "<hr>";
            echo '<table>';
            echo '<tr> <th>ID</th> <th>NOME</th> <th>Data de Retirada</th> <th>Data de Devolução</th> <th>FUNÇÃO</th></tr>';
			while($row = mysqli_fetch_array($resultado)){
                echo '<tr>';
                echo '<td>';
				echo $row[2];
				echo '</td>';
                echo '<td>';
				echo $row[3];
				echo '</td>';
                echo '<td>';
                echo $row[4];
                echo '</td>';
                echo '<td>';
                echo $novaData = date('Y-m-d', strtotime($row[4]. ' + 30 days'));
                echo '</td>';
                echo '<td>';
                echo '<form method="post" action="devolver.php">
                    <input type="hidden" value="'.$row[5].'" name="idRetirada" size="20"><br>
                    <input type="submit" value="DEVOLVER">
                    </form>';
                echo '</td>';
                
            };

            echo '</table>';
			echo "<br>";
		    echo "<a href='site.php' class='sair'>Sair</a>";
			$conexao -> close();
}
    ?>
</body>
</html>