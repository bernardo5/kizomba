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
			<p>As aulas e as festas não te chegam? Queres passar umas férias a kizombar dia e noite? Temos a solução ideal para ti!! Procura o festival perfeito para ti!</p>
			
		</div>
		<div id="featured">
			<div class="title">
				<h2>Pesquisa</h2>
			</div>
				<form action="aulas_result.php">
					<p>Selecione a informação de pesquisa de entre as possibilidades:</p>
					<p>Dia da semana:</p>
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
					<p></p>
					<p></p>
					<p></p>
					<p></p>
					<input type="submit" name="submit" value="submit" />
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
