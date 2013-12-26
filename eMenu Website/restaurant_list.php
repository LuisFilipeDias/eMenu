<?php
session_start(); // Must start session first thing

$toplinks = '<a href="join_form.php">Registar</a> &bull; <a href="login.php">Entrar</a>';
include_once "connect_to_mysql.php";
			
	
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Lista de Restaurantes</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/buttons.css" type="text/css">
		<link rel="stylesheet" href="css/titles.css" type="text/css">
		
	</head>

	<body>
		<div id="big_wrapper">
			<header id="top_header">
				<hgroup id="top_group" >
					<div id="divh1"><a href="index.php">éMenu</a></div>
					<div id="divh2">é a 'Plataforma Digital para Restaurantes'</div>
				</hgroup>
					<div id="imgwrapper">
						<img src="img/rest.png"/>
					</div>
			</header>

	
			<div id="new_div"  style="width: 100%; display: table;">
				<div id="main_section" style="display: table-row">
					 
					<div id="left_section">
						<nav id="top_menu">
							<ul>
	    						<li><a href="index.php">Início</a></li>
	    						<li><a href="restaurant_list.php">Restaurantes</a></li>
	    						<li style="float: right"><?php echo $toplinks; ?></li>
							</ul>
						</nav>

							
						<div id="transparent_box" style="text-align: center">
							
						    <div id="title_profile"  style="font-size: 35px" style="display: inline-block;">Lista de Restaurantes</div><br /><br /></br></br></br>
							
	    						<div id="simple_links" style="font-size: 20px">
	    							<?php 
	    								$c_id=0;
										while($c_id < 100)	
										{
											$c_id++;			
											$sql = mysql_query("SELECT * FROM members WHERE id='$c_id' LIMIT 1");
											$count = mysql_num_rows($sql);
											if ($count != 0) 
											{
												while($row = mysql_fetch_array($sql))
												{
													$restaurant = $row["restaurant"];
												}
												$restaurant_links = '<div><b>' .$restaurant. ':</b>   <a href="public_profile.php?id=' . $c_id . '">Perfil</a> &bull; 
												<a href="public_menus.php?id=' . $c_id . '">Ementa</a></div></br></br>';
												echo $restaurant_links; 
											}
										} ?>
								</br></br></div>
							</div>
						</div>

					<div id="right_section" >	
					</div>
					
				</div>
			</div>
			
			<footer id="the_footer">
				Plataforma digital de suporte a aplicação mobile de consulta de ementas.<br>
				Problemas ou dúvidas enviar e-mail para luisfiliperdias@gmail.com<br><br>
				<strong> Copyright &copy; 2013 emenu-app.com. All rights reserved.</strong>
			</footer>
		</div>					
	</body>
	
</html>