<?php
session_start(); 
$toplinks = "";
if (isset($_SESSION['id'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
	$restaurant_link = '<a href="#" onClick="myFunction()">Restaurantes</a>';
} else {
	#header("Location: non private index");
	$userid = "1";
	$restaurant_link = '<a href="restaurant_list.php">Restaurantes</a>';
	echo 'Por favor, volte a <a href="login.php">Entrar</a>';
    exit(); 
}
//Connect to the database through our include 
include_once "connect_to_mysql.php";
	// Query member data from the database and ready it for display
	$sql = mysql_query("SELECT * FROM members WHERE id='$userid'"); 
	while($row = mysql_fetch_array($sql)){
		$country = $row["country"];
		$restaurant = $row["restaurant"];
		$state = $row["state"];
		$city = $row["City"];
		$accounttype = $row["accounttype"];	
		$bio = $row["bio"];	
		$signupdate = strftime("%b %d, %Y", strtotime($row['signupdate']));
	}
	// Give different options or display depending on which user type it is
	if ($accounttype == "a") {
		$userOptions = "You get options for Normal User";
	} else if ($accounttype == "b") {
		$userOptions = "You get options for Expert User";
	} else {
		$userOptions = "You get options for Super User";
	}						

	$toplinks = '<a href="member_menus.php?id=' . $userid . '">Ementa</a> &bull; 
	<a href="member_profile.php?id=' . $userid . '">' . $restaurant . '</a> &bull; 
	<a href="member_account.php?id=' . $userid . '">Conta</a> &bull; 
	<a href="logout.php">Terminar Sessão</a>';
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Conta de Membro</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/buttons.css" type="text/css">
		<link rel="stylesheet" href="css/titles.css" type="text/css">
		<script type="text/javascript">
  			
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

							
						<div id="transparent_box" style="text-align: center">
							
						    <div id="title_profile" style="display: inline-block;">
						    	<b>
						    		<?php echo '<a href="member_profile.php?id=' . $userid . '">' . $restaurant . '</a>'; ?>
						    	</b>
						    	: a sua conta</div><br /><br />
							
							<ul id="plate_title"  style="display: inline-block;">
							 	<br /><br /><li><a href="edit_info.php" target="_self">Editar Informações de Conta</a></li>	<br />
								<br /><br /><li><a href="edit_plates.php" target="_self">Editar Ementas</a></li><br />							
								<br /><br /><li><a href="edit_pic.php" target="_self">Editar Imagem de Conta</a></li><br /><br />	
							</ul>
							<br />
							
							<br /><br /><br /><div style="float: right"><b>Data de registo: </b><?php echo "$signupdate"; ?></div><br /><br /><br />
							 
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