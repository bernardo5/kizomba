<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Skeleton 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130902

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="page" class="container">
	<div id="header">
		<div id="logo">
			<img src="images.png" alt="" />
			<h1><a href="#">Kizomba</a></h1>
			<span>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>, adapted by <a href="https://pt.linkedin.com/in/bernardo-gomes-759391b5" rel="nofollow">Bernardo</a></span>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="festas.php" accesskey="2" title="">Festas</a></li>
				<li><a href="aulas.php" accesskey="3" title="">Aulas</a></li>
				<li class="current_page_item"><a href="festivais.php" accesskey="4" title="">Festivais</a></li>
				<li><a href="contact.html" accesskey="5" title="">Contacto</a></li>
				<li>
					<audio controls>
						<source src="my_plylist.mp3" type="audio/mpeg">
					</audio>
				</li>
			</ul>
		</div>
	</div>
	<div id="main">
		<div id="banner">
			<img src="flashmob.jpg" alt="" class="image-full" />
		</div>
		<div id="welcome">
			<div class="title">
				<h2>Festivais por...</h2>
			</div>
			<p>O resultado da sua pesquisa encontra-se apresentado de seguida. No caso de não terem surgido festivais, experimente retirar um campo de pesquisa, ou alterar um deles.</p>
			
		</div>
		<div id="featured">
			<div class="title">
				<h2>Pesquisa</h2>
			</div>
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
					
					echo($nome);
					echo($organizacao);
					echo($cidade);
					echo($pais);
					echo($preco);
										
					$sql="Select nome, pais, cidade, preco, inicio, fim
					from festival
					where
					 nome like '%$nome%'
					
					and cidade like '%$cidade%'
					and preco like '%$preco%'
					and pais like '%$pais%'
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
						echo("<tr><td><strong>Festival</strong></td><td><strong>Pais</strong></td><td><strong>Cidade</strong></td><td><strong>preço</strong></td><td><strong>inicio</strong></td><td><strong>fim</strong></td></tr>");
						foreach($result as $row)
						{
							echo("<tr><td>");
							echo($row['nome']);
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
				<p><a href="festivais.php" accesskey="4" title="">Voltar à pesquisa</a></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
