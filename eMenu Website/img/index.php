<?php
session_start(); 
// Must start session first thing
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// See if they are a logged in member by checking Session data
$toplinks = "";
if (isset($_SESSION['id'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
	$toplinks = '<a href="member_profile.php?id=' . $userid . '">' . $username . '</a> &bull; 
	<a href="member_account.php">Account</a> &bull; 
	<a href="logout.php">Log Out</a>';
} else {
	$toplinks = '<a href="join_form.php">Registar</a> &bull; <a href="login.php">Entrar</a>';
}
?>


<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>eMenu</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
	</head>
	
	<body>
		<div id="big_wrapper">
			<header id="top_header">
				<hgroup id="top_group" >
					<div id="divh1"><a href="index.php">e-Menu</a></div>
					<div id="divh2">Plataforma Digital para Restaurantes</div>
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
	    						<li><a href="index.php">Inicio</a></li>
	    						<li><?php echo $toplinks; ?></li>
							</ul>
						</nav>

							
						<div style="padding-left:100px; padding-top:50px">
					  		<h2>Benvido ao e-Menu.</h2>
					  		<p>O website onde pode inserir os seus menus, e desta forma disponibiliza-os para os seus clients, na forma de Apps.
					  			<br><br><br><br><br><br><br><br><br><br><br></p>
						</div>
						
					</div>

					<div id="right_section" >	
					</div>
					
				</div>

			
			</div>
			
			<footer id="the_footer">
				Mensagem genérica sobre serviço.<br>
				Problemas ou dúvidas enviar e-mail para luisfiliperdias@gmail.com<br><br>
				<strong> Copyright &copy; 2013 luisfrdias.com. All rights reserved.</strong>
			</footer>
		</div>					
	</body>
	
	
</html>


