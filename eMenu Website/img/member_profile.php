<?php
session_start(); // Must start session first thing
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
    $restaurant = $_SESSION['restaurant'];
	$toplinks = '<a href="member_profile.php?id=' . $userid . '">' . $username . '</a> &bull; 
	<a href="member_account.php">Conta</a> &bull; 
	<a href="logout.php">Sair</a>';
} else {
	$toplinks = '<a href="join_form.php">Register</a> &bull; <a href="login.php">Entrar</a>';
}
?>

<?php

// Use the URL 'id' variable to set who we want to query info about
$id = ereg_replace("[^0-9]", "", $_GET['id']); // filter everything but numbers for security
if ($id == "") {
	echo "Missing Data to Run";
	exit();
}

//Connect to the database through our include 
include_once "connect_to_mysql.php";
// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM members WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count > 1) {
	echo "There is no user with that id here.";
	exit();	
}
while($row = mysql_fetch_array($sql)){
	$restaurant = $row["restaurant"];
	$country = $row["country"];
	$city = $row["city"];
	$accounttype = $row["accounttype"];
	$resumee = $row["resumee"];
	// Convert the sign up date to be more readable by humans
	$signupdate = strftime("%b %d, %Y", strtotime($row['signupdate']));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Perfil de Membro</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
		</style>
		
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

							
						<table style="background-color: #CCC" width="100%" border="0" cellpadding="12">
						  	<tr>
						    	<td><h1>Perfil do <?php echo $_SESSION['restaurant']; ?></h1></td>
						  	</tr>
						</table>
						<table width="90%" align="center" cellpadding="5" cellspacing="5" style="line-height:1.5em;">
						  	<tr>
						    	<!--<td width="31%" rowspan="2" valign="top">
						    	<!-- See the more advanced member system tutorial to see how to place default placeholder pic until member uploads one 
						    		<div align="center"><img src="memberFiles/<?php echo "$id"; ?>/pic1.jpg" alt="Ad" width="250" /></div>
						    	</td> -->
						    	<td width="20%" rowspan="2" valign="top">
							  		Nome: <?php echo $_SESSION['username']; ?><br />
						      		Pais: <?php echo "$country"; ?> <br />
						      		Cidade: <?php echo "$city"; ?><br />
						      		Prato 1: <?php echo "$plate_1"; ?> <br />
						      		Prato 2: <?php echo "$plate_2"; ?><br />
						      		Prato 3: <?php echo "$plate_3"; ?><br />
						      		Prato 4: <?php echo "$plate_4"; ?><br />
						    	</td>
						    	<td width="49%" valign="top">Resumo</td>
							</tr>
							<tr>
							    <td valign="top"><?php echo "$resumee"; ?></td>
							</tr>
							<tr>
								<td valign="top">&nbsp;</td>
							    <td colspan="2" valign="top">Sign up date: <?php echo "$signupdate"; ?></td>
							</tr>
						</table>
						
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