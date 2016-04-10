<html>
	<body>
		<h2>Festas por...</h2>

		<p>Farto de procurar uma festa e de não a encontrar?? Nós damos uma ajudinha ;) seleciona os campos para uma pesquisa selectiva</p>

		<h2>Pesquisa</h2>

		<form action="festas_result_app.php">
					<p>Selecione a informação de pesquisa de entre as possibilidades:</p>
					<p>Data da festa:</p>
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
						$sql="select distinct data_inicio from festa
						where data_inicio >= current_timestamp;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						/**********************************************/
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>data_inicio</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['data_inicio']);
							echo("</td><td>");
							$numb=$row['data_inicio'];
							echo("<input type=\"radio\" name=\"data\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/*Pesquisa pela entidade de organizacao*/
						echo("<p></p><p></p>");
						echo("<p>Entidade Organizadora:</p>");
						$sql="select distinct nome_entidade from festa;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Organização</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nome_entidade']);
							echo("</td><td>");
							$numb=$row['nome_entidade'];
							echo("<input type=\"radio\" name=\"entidade\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						/*****************************************/
						
						/*Pesquisa por local*/
						echo("<p></p><p></p>");
						echo("<p>Local:</p>");
						$sql="select distinct local from festa;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Local do evento</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['local']);
							echo("</td><td>");
							$numb=$row['local'];
							echo("<input type=\"radio\" name=\"local\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/*****************************************/
						
					    $connection = null;
					
					?>
					<p></p>
					<p></p>
					<p></p>
					<p></p>
					<input type="submit" name="submit" value="submit" />
				</form>	
	</body>
</html>