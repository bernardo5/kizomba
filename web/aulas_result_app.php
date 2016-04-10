<html>
	<body>
		<h2>Resultado...</h2>

		<p>O resultado da sua pesquisa encontra-se apresentado de seguida. No caso de não terem surgido aulas, experimente retirar um campo de pesquisa, ou alterar um deles.</p>

		<?php
					$host = "db.ist.utl.pt";
					$user = "ist175573";
					$pass = "swex6595";
					$dsn = "mysql:host=$host;dbname=$user";
					try
					{
						$connection = new PDO($dsn, $user, $pass);
					}
					catch(PDOException $exception)
					{
						echo("<p>Error: ");
						echo($exception->getMessage());
						echo("</p>");
						exit();
					}
					/*busca de resultados para a pesquisa*/
					$dia=$_REQUEST['dia_semana'];
					$estilo=$_REQUEST['estilo'];
					$cidade=$_REQUEST['local'];
					$prof=$_REQUEST['prof'];
					$nivel=$_REQUEST['nivel'];
					
					/*echo($data);
					echo("<p></p>");
					echo($organizacao);
					echo("<p></p>");
					echo($local);
					echo("<p></p>");*/					
					$sql="select a.dia_semana, a.estilo, a.nome_prof, a.nivel, a.preco, e.nome, e.morada
							from aula as a, Professor as p, Escola_danca as e
						where a.dia_semana like '%$dia%'
						and a.estilo like '%$estilo%'
						and a.nivel like '%$nivel%'
						and p.nome like '%$prof%'
						and e.cidade like '%$cidade%'
						and p.nome=a.nome_prof
						and a.nome_escola=e.nome;";
						
					$result = $connection->query($sql);
					if ($result == FALSE)
					{
						$info = $connection->errorInfo();
						echo("<p>Error: {$info[2]}</p>");
						exit();
					}
					/**********************************************/
					
					$nrows= $result->rowCount();
					
					if($nrows!=0) /*ha festa*/
					{
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td><strong>dia</strong></td><td><strong>estilo</strong></td><td><strong>Professor</strong></td><td><strong>nivel</strong></td><td><strong>preço</strong></td><td><strong>escola</strong></td><td><strong>morada</strong></td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['dia_semana']);
							echo("</td><td>");
							echo($row['estilo']);
							echo("</td><td>");
							echo($row['nome_prof']);
							echo("</td><td>");
							echo($row['nivel']);
							echo("</td><td>");
							echo($row['preco']);
							echo("</td><td>");
							echo($row['nome']);
							echo("</td><td>");
							echo($row['morada']);
							echo("</td></tr>");
						}
						echo("</table>");						
					}
					else
					{
							echo("<p>Não há aulas com os requesitos pretendidos</p>");
					}
					/*****************************************/
						
				    $connection = null;
					
				?>

				<p><a href="aulas_app.php" accesskey="2" title="">Voltar à pesquisa</a></p>
					

	</body>
	
</html>