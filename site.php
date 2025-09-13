<html>
    <head>
        <title>.: Meu lindo site :.</title>
    
		<style>

			.sair:link, .sair:visited {
			background-color: white;
			color: black;
			border: 2px solid green;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			}

			.sair:hover, .sair:active {
			background-color: green;
			color: white;
			}
		</style>
	</head>
	
    <body>
		<form method="post" action="buscaDadosID.php">
			<label>Digite o ID do livro: </label>
			<input type="text" name="idLivro" size="20">
			<input type="submit" value="BUSCAR">
		</form>
		<form method="post" action="buscaDadosNOME.php">
			<label>Digite o nome do livro: </label>
			<input type="text" name="nomeLivro" size="20">
			<input type="submit" value="BUSCAR">
		</form>
		<form method="post" action="clientes.php">
			<label>Sistema de Clientes - Digite seu nome: </label>
			<input type="text" name="nomeCliente" size="20">
			<input type="submit" value="BUSCAR">
		</form>
		<?php
			// iniciar uma sessão
			session_start();

			
				echo '<table>
					<tr>
						<td width=50%>
							<center>
							<span class="corBranca">Bem vindo</span>
							<br>
							
							</center>
						</td>
						
						</tr>
						
				</table>';
			

			$hostname = "127.0.0.1";
			$user = "root";
			$password = "root";
			$database = "biblioteca";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			$sql="SELECT * FROM `biblioteca`.`livro`;";
                 
			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($row = mysqli_fetch_array($resultado)){
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
				while($row2 = mysqli_fetch_array($resultado2)){
					echo $row2[1];
					echo '<br>';
				}
				

				
				echo '<form method="post" action="retirar.php">
					<input type="hidden" name="idLivro" value="'.$row[0].'">
					<input type="hidden" name="nomeLivro" value="'.$row[1].'">
					<input type="submit" value="RETIRAR LIVRO">
				
				</form>
				';
				echo '<hr>';
			}
			$conexao -> close();
           
		?>
		<br>
		<a href="sair.php" class='sair'>Sair</a>
	</body>
</html>