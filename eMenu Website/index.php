<?php
session_start(); 

$toplinks = "";
if (isset($_SESSION['id'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $restaurant = $_SESSION['restaurant'];
	$toplinks = '<a href="member_menus.php?id=' . $userid . '">Ementa</a> &bull; 
	<a href="member_profile.php?id=' . $userid . '">' . $restaurant . '</a> &bull; 
	<a href="member_account.php?id=' . $userid . '">Conta</a> &bull; 
	<a href="logout.php">Terminar Sessão</a>';
	$restaurant_link = '<a href="#" onClick="myFunction()">Restaurantes</a>';
} else {
	$restaurant_link = '<a href="restaurant_list.php">Restaurantes</a>';
	$toplinks = '<a href="join_form.php">Registar</a> &bull; <a href="login.php">Entrar</a>';
}
?>


<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>eMenu</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/titles.css" type="text/css">
		
		
		<script>
			function myFunction()
			{
				alert("Para ver a lista de restaurantes deve Terminar Sessão");
			}
		</script>
						
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
	    						<li><?php echo $restaurant_link; ?></li>
	    						<li style="float: right"><?php echo $toplinks; ?></li>
							</ul>
						</nav>

							
						<div id="transparent_box">
					  		
					  						   	
							<div align="center" style="text-align: center">
						       		<div id="title_profile" style="display: inline-block;"><b>Bem-vindo ao éMenu!</b></div><br /><br /><br /><br />
							</div>
					  		
					  		<div  style="padding-left:80px; padding-right:80px;">
					  			Após o registo nesta plataforma vai poder <b>inserir e partilhar menus</b> e outras informações 
					  			do seu restaurante de forma <b>fácil e interactiva</b>.</br></br>
					  			Todos os dados inseridos irão ficar disponíveis para consulta em <b>aplicações para smartphone</b>, à distância de um clique.</br></br>
					  			Fique mais perto dos seus clientes, a <b>qualquer momento</b>, em <b>qualquer lugar</b>!</br></br></br></br>
					  			
					  			<b>Com os melhores cumprimentos,</b></br></br>
					  			A equipa do <b>éMenu</b>
					  			</br></br></br><br><br><br>
					  		</div>
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


