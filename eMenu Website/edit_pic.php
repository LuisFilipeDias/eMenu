<?php
session_start(); // Must start session first thing

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
	echo 'Por favor, volte a <a href="login.php">Entrar</a>';
    exit(); 
}
?>

<?php
session_start(); // Must start session first thing
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// Here we run a login check
if (!isset($_SESSION['id'])) { 
   echo '<a href="login.php">Entre</a> para acessar a sua conta';
  exit(); 
} 
// Place Session variable 'id' into local variable
$id = $_SESSION['id'];
// Process the form if it is submitted
if ($_FILES['uploadedfile']['tmp_name'] != "") {
    // Run error handling on the file
    // Set Max file size limit to somewhere around 120kb
    $maxfilesize = 350000;
    // Check file size, if too large exit and tell them why
    if($_FILES['uploadedfile']['size'] > $maxfilesize ) { 
        echo '<br /><br />Imagem demasiado grande. Deve ser inferior a 300 Kbs.<br /><br />
        <a href="edit_pic.php">Clique aqui</a> para tentar novamente';
        unlink($_FILES['uploadedfile']['tmp_name']); 
        exit();
    // Check file extension to see if it is .jpg or .gif, if not exit and tell them why
    } else if (!preg_match("/\.(gif|jpg)$/i", $_FILES['uploadedfile']['name'] ) ) {
        echo '<br /><br />A sua image deve estar no formato .gif ou .jpg<br />
        <a href="edit_pic.php">Clique aqui</a> para tentar novamente';
        unlink($_FILES['uploadedfile']['tmp_name']);
        exit();
        // If no errors on the file process it and upload to server 
    } else { 
        // Rename the pic
        $newname = "pic1.jpg";
        // Set the direntory for where to upload it, use the member id to hit their folder
        // Upload the file
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "memberFiles/$id/".$newname)) {
            echo 'Successo! A imagem foi carregada e esta agora visivel no seu perfil!<br /><br />
            <a href="member_profile.php?id=' . $userid . '">Clique</a> para voltar ao seu perfil';
            exit();
        } else {
            echo 'Houve um erro no carregamento da imagem, tente novamente. Se o problema persistir, por favor contacte-nos por e-mail.<br /><br />
            <a href="edit_pic.php">Clique</a> para tentar novamente';
            exit();
        }
    } // close else after file error checks
} // close if post the form
?>

<?php
//Connect to the database through our include 
include_once "connect_to_mysql.php";
	// Query member data from the database and ready it for display
	$sql = mysql_query("SELECT * FROM members WHERE id='$userid'"); 
	while($row = mysql_fetch_array($sql)){
		$country = $row["country"];
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

?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Editar Imagem de Conta</title>
		<script type="text/javascript">
			<!-- Form Validation -->
			function validate_form ( ) 
			{ 
				valid = true; 
				if ( document.form.uploadedfile.value == "" ) 
				{ 
					alert ( "Procure um ficheiro para carregar." ); 
					valid = false;
				}
				return valid;
			}
			<!-- Form Validation -->
			
			function myFunction()
			{
				alert("Para ver a lista de restaurantes deve Terminar Sessão");
			}
		</script>

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
	    						<li><?php echo $restaurant_link; ?></li>
	    						<li style="float: right"><?php echo $toplinks; ?></li>
							</ul>
						</nav>

							
						<div id="transparent_box" style="text-align: center">
							
						    <div id="title_profile" style="display: inline-block;">Carregue ou altere a sua imagem aqui:</div><br /><br /><br /><br />
							
							 
							<table border="2" align="center" cellpadding="5" cellspacing="5">
						    	<form action="edit_pic.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
							        <tr>
							        	<td colspan="2"><img src="memberFiles/<?php echo "$id"; ?>/pic1.jpg" alt="Ad" width="200" /></td>
							        </tr>
									<tr>
							        	<td colspan="2"><input name="uploadedfile" type="file" /></td>
							        </tr>
							        <tr>
							        	<td colspan="2">
							        		<div align="center">
							            		<input type="submit" class="button" name="Submit" value="Carregar imagem" />
							         		</div>
							         	</td>
							        </tr>
						      	</form>
						      </table>
							
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