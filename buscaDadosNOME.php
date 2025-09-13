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
    $nomeLivro = $conexao->real_escape_string($_POST['nomeLivro']);

    $sql="SELECT * FROM `biblioteca`.`livro` where `nome` = '".$nomeLivro."';";
                 
			$resultado = $conexao->query($sql);
			
			echo '<hr>';
			if($resultado->num_rows !=0){
                $row = $resultado -> fetch_array();
                
                echo 'Nome do livro: ';
				echo $row[1];
				echo '<br>';
				echo 'Autor: ';
				echo $row[2];
				echo '<br>';
				echo 'Ano: ';
				echo $row[3];
				echo '<br>';
				echo 'Genero: ';
				echo $row[4];
				echo '<br>';
				echo 'Editora: ';
				echo $row[5];
				echo '<br>';
				echo 'Paginas: ';
				echo $row[6];
				echo '<br>';
				echo 'ID do funcionário que cadastrou: ';
				echo $row[9];
				echo '<br>';
				echo 'Nome do funcionário que cadastrou: ';
				echo $row[8];

				$sql2="SELECT * FROM `biblioteca`.`retirada` where `idLivro` = '".$row[0]."';";
				$resultado2 = $conexao->query($sql2);
				echo '<br>';
				echo 'Retirado por: <br>';
				
				if($resultado2->num_rows > 0) {
            		while($row2 = $resultado2->fetch_array()) {
                	echo $row2[1];
                	echo '<br>';
           			 }
       		 	} else {
           		 echo 'Nenhuma retirada registrada<br>';
    			}
				
            } else{
                
                echo 'Livro não encontrado!';
            }	
			echo "<br>";
		    echo "<a href='site.php' class='sair'>Sair</a>";
			$conexao -> close();
}

?>