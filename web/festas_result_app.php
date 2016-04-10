<html>
	<body>
		<h2>Festas por...</h2>

		<p>O resultado da sua pesquisa encontra-se apresentado de seguida. No caso de não terem surgido festas,
		 experimente retirar um campo de pesquisa, ou alterar um deles.</p>

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
					$data=$_REQUEST['data'];
					$organizacao=$_REQUEST['entidade'];
					$local=$_REQUEST['local'];
					
					/*echo($data);
					echo("<p></p>");
					echo($organizacao);
					echo("<p></p>");
					echo($local);
					echo("<p></p>");*/					
					$sql="select f.nome_entidade, f.nome_festa, f.data_inicio, f.data_fim, f.local, f.descricao, f.custo, A.nome_prof, t.nome_dj, P.nome_rp, R.contacto
							from festa as f, Aula_aberta as A, toca as t, Promove as P, RP as R
						where f.data_inicio like '%$data%' 
						and f.nome_entidade like '%$organizacao%' 
						and f.local like '%$local%'
						and A.nome_festa=f.nome_festa
						and t.nome_festa=f.nome_festa
						and P.nome_festa=f.nome_festa
						and f.data_inicio>=current_timestamp
						and R.nome=P.nome_rp;";
						
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
						echo("<tr><td><strong>Entidade Organizadora</strong></td><td><strong>nome da festa</strong></td><td><strong>data e hora</strong></td><td><strong>data e hora de fim</strong></td><td><strong>local</strong></td><td><strong>descrição da festa</strong></td><td><strong>custo</strong></td><td><strong>Aula_aberta</strong></td><td><strong>DJ</strong></td><td><strong>RP</strong></td><td><strong>guest</strong></td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nome_entidade']);
							echo("</td><td>");
							echo($row['nome_festa']);
							echo("</td><td>");
							echo($row['data_inicio']);
							echo("</td><td>");
							echo($row['data_fim']);
							echo("</td><td>");
							echo($row['local']);
							echo("</td><td>");
							echo($row['descricao']);
							echo("</td><td>");
							echo($row['custo']);
							echo("</td><td>");
							echo($row['nome_prof']);
							echo("</td><td>");
							echo($row['nome_dj']);
							echo("</td><td>");
							echo($row['nome_rp']);
							echo("</td><td>");
							echo($row['contacto']);
							echo("</td></tr>");
						}
						echo("</table>");						
					}
					else
					{
							echo("<p>Não há festas com os requesitos pretendidos</p>");
					}
					/*****************************************/
						
				    $connection = null;
					
				?>
				<p><a href="festas_app.php" accesskey="2" title="">Voltar à pesquisa</a></p>
	</body>

</html>