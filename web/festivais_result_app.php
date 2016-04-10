<html>
	<body>
			<h2>Festivais por...</h2>

			<p>O resultado da sua pesquisa encontra-se apresentado de seguida. 
				No caso de não terem surgido festivais, experimente retirar um campo de pesquisa, ou alterar um deles.</p>

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
					$nome=$_REQUEST['nome_festival'];
					$organizacao=$_REQUEST['organizacao'];
					$cidade=$_REQUEST['cidade'];
					$pais=$_REQUEST['pais'];
					$preco=$_REQUEST['preco'];
										
					$sql="Select nome_festival, nome_entidade, pais, cidade, preco, inicio, fim
					from festival, organizado, Entidade_organizadora
					where nome_festival like '%$nome%'
					and cidade like '%$cidade%'
					and preco like '%$preco%'
					and pais like '%$pais%'
					and nome_entidade like '%$organizacao%'
					and nome_festival=festival.nome
					and inicio>=current_date
					and nome_entidade=Entidade_organizadora.nome;
					";
					/*and e.nome like '%$organizacao%'*/
					/* o.nome_festival=f.nome and o.nome_entidade =e.nome*/
						
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
						echo("<tr><td><strong>Festival</strong></td><td><strong>Entidade</strong></td><td><strong>Pais</strong></td><td><strong>Cidade</strong></td><td><strong>preço</strong></td><td><strong>inicio</strong></td><td><strong>fim</strong></td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nome_festival']);
							echo("</td><td>");
							echo($row['nome_entidade']);
							echo("</td><td>");
							echo($row['pais']);
							echo("</td><td>");
							echo($row['cidade']);
							echo("</td><td>");
							echo($row['preco']);
							echo("</td><td>");
							echo($row['inicio']);
							echo("</td><td>");
							echo($row['fim']);
							echo("</td></tr>");
						}
						echo("</table>");						
					}
					else
					{
							echo("<p>Não há festivais com os requesitos pretendidos</p>");
					}
					/*****************************************/
						
				    $connection = null;
					
				?>
				<p><a href="festivais_app.php" accesskey="4" title="">Voltar à pesquisa</a></p>
	</body>
</html>