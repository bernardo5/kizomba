<html>
	<body>
		<h2>Festivais por...</h2>

		<p>As aulas e as festas não te chegam? Queres passar umas férias a kizombar dia e noite? 
			Temos a solução ideal para ti!! Procura o festival perfeito para ti!</p>

			<h2>Pesquisa</h2>

			<form action="festivais_result_app.php">
					<p>Selecione a informação de pesquisa de entre as possibilidades:</p>
					<p>Nomes do festival:</p>
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
						$sql="select distinct nome from festival;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						/**********************************************/
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>festival</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nome']);
							echo("</td><td>");
							$numb=$row['nome'];
							echo("<input type=\"radio\" name=\"nome_festival\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/*Pesquisa pela entidade de organizacao*/
						echo("<p></p><p></p>");
						echo("<p>Organizacao:</p>");
						$sql="select distinct nome from Entidade_organizadora;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Organizacao</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nome']);
							echo("</td><td>");
							$numb=$row['nome'];
							echo("<input type=\"radio\" name=\"organizacao\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						/*****************************************/
						
						/*Pesquisa por local*/
						echo("<p></p><p></p>");
						echo("<p>Pais:</p>");
						$sql="select distinct pais from festival;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Pais</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['pais']);
							echo("</td><td>");
							$numb=$row['pais'];
							echo("<input type=\"radio\" name=\"pais\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/*****************************************/
						
						
						/*Pesquisa por nome do professor*/
						echo("<p></p><p></p>");
						echo("<p>Cidade:</p>");
						$sql="select distinct cidade from festival;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>cidade</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['cidade']);
							echo("</td><td>");
							$numb=$row['cidade'];
							echo("<input type=\"radio\" name=\"cidade\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/********************************************/
						
						/*Pesquisa por nome do nivel*/
						echo("<p></p><p></p>");
						echo("<p>Preco:</p>");
						$sql="select distinct preco from festival;";
						
						$result = $connection->query($sql);
						if ($result == FALSE)
						{
							$info = $connection->errorInfo();
							echo("<p>Error: {$info[2]}</p>");
							exit();
						}
						
						echo("<table border=\"1\" align=\"center\">");
						echo("<tr><td>Preco</td><td>selecionar</td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['preco']);
							echo("</td><td>");
							$numb=$row['preco'];
							echo("<input type=\"radio\" name=\"preco\" value=\"$numb\" />");
							echo("</td></tr>");
						}
						echo("</table>");
						
						
						/********************************************/
						
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