<html>
	<body>
		<h2>Aulas por...</h2>

		<p>Queres começar a dançar mas não sabes onde? Temos a solução para ti!
		 As melhores aulas nas melhores escolas! Preenche a pesquisa e encontra a aula ideal para ti!</p>

		 <h2>Pesquisa</h2>

		 <p>Selecione a informação de pesquisa de entre as possibilidades:</p>
					<p>Dia da semana:</p>
					<form action="aulas_result_app.php">
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
						/*tirar da base de dados as datas das festas*/
						$sql="select distinct dia_semana from aula;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						/**********************************************/
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>dia da semana</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['dia_semana']);
							echo("</td><td>");
							$numb=$row['dia_semana'];
							echo("<input type=\"radio\" name=\"dia_semana\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/*Pesquisa pela entidade de organizacao*/
						echo("<p></p><p></p>");
						echo("<p>Estilo:</p>");
						$sql="select distinct estilo from aula;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Estilo</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['estilo']);
							echo("</td><td>");
							$numb=$row['estilo'];
							echo("<input type=\"radio\" name=\"estilo\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						/*****************************************/
						
						/*Pesquisa por local*/
						echo("<p></p><p></p>");
						echo("<p>Cidade:</p>");
						$sql="select distinct cidade from Escola_danca;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Cidade</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['cidade']);
							echo("</td><td>");
							$numb=$row['cidade'];
							echo("<input type=\"radio\" name=\"local\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/*****************************************/
						
						
						/*Pesquisa por nome do professor*/
						echo("<p></p><p></p>");
						echo("<p>Professor:</p>");
						$sql="select distinct nome from Professor;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Professor</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nome']);
							echo("</td><td>");
							$numb=$row['nome'];
							echo("<input type=\"radio\" name=\"prof\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/********************************************/
						
						/*Pesquisa por nome do nivel*/
						echo("<p></p><p></p>");
						echo("<p>Níveis:</p>");
						$sql="select distinct nivel from aula;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Nível</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nivel']);
							echo("</td><td>");
							$numb=$row['nivel'];
							echo("<input type=\"radio\" name=\"nivel\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/********************************************/
						
					    $connection = null;
					
					?>

					<input type="submit" name="submit" value="submit" />
					</form>

	</body>
	
</html>