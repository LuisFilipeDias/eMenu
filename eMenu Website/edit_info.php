<?php
session_start(); 

// Must start session first thing
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// Here we run a login check
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
	echo 'Por favor, volte a <a href="login.php">Entrar</a>';
}

//Connect to the database through our include 
include_once "connect_to_mysql.php";
// Place Session variable 'id' into local variable
$id = $_SESSION['id'];
// Process the form if it is submitted
if ($_POST['country']) 
{
    $country = $_POST['country'];
    $city = $_POST['city'];
    $resumee = $_POST['resumee'];
	$phone_1 = $_POST["phone_1"];
	$phone_2 = $_POST["phone_2"];
	$mail_1 = $_POST["mail_1"];
	$mail_2 = $_POST["mail_2"];
    $website = $_POST['website'];
	header('Location: member_profile.php?id=' . $id . '');
    $sql = mysql_query("UPDATE members SET country='$country', city='$city', resumee='$resumee', phone_1='$phone_1', phone_2='$phone_2', mail_1='$mail_1', mail_2='$mail_2', website='$website'  WHERE id='$id'"); 
   	#echo 'A sua conta foi actualizada. Dados disponiveis para consulta.<br /><br />
	#Para voltar para o seu perfil, <a href="member_profile.php?id=' . $id . '">clique aqui</a>';
exit();
} // close if post

// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM members WHERE id='$id' LIMIT 1");
while($row = mysql_fetch_array($sql))
{
	$country = $row["country"];
	$city = $row["city"];
	$resumee = $row["resumee"];
	$website = $row["website"];
	$phone_1 = $row["phone_1"];
	$phone_2 = $row["phone_2"];
	$mail_1 = $row["mail_1"];
	$mail_2 = $row["mail_2"];
}
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/titles.css" type="text/css">
		<link rel="stylesheet" href="css/buttons.css" type="text/css">

		<title>Editar Informações de Conta</title>
		
		<script type="text/javascript">
			function validate_form() 
			{ 
				valid = true; 
				if ( document.form.country.value == "" ) 
				{ 
					alert ( "País não pode ficar em branco." ); 
					valid = false;
				}
				if ( document.form.city.value == "" ) 
				{ 
					alert ( "Cidade não pode ficar em branco." ); 
					valid = false;
				}
				if ( document.form.website.value == "" ) 
				{ 
					alert ( "Website não pode ficar em branco." ); 
					valid = false;
				}
				return valid;
			}
			
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
						       		<div id="title_profile" style="display: inline-block;">Edite as suas informações aqui</div><br /><br />
							</div>
					     
					     	<table align="center" cellpadding="8" cellspacing="8" >
					      		<form action="edit_info.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
						  
							    	<tr>
								      	<td><div align="right"><b>País:</b></div></td>
								      	<td><select name="country">
								      		<option value="<?php echo "$country"; ?>"><?php echo "$country"; ?></option>
								      		<option value="Portugal"><?php if($country != "Portugal"){ echo "Portugal";} ?> </option>
								      		<option value="Brasil"><?php if($country != "Brasil"){ echo "Brasil";} ?> </option>
								      		<option value="Angola"><?php if($country != "Angola"){ echo "Angola";} ?> </option>
								      		<option value="Moçambique"><?php if($country != "Moçambique"){ echo "Moçambique";} ?> </option>
								      		<option value="Cabo Verde"><?php if($country != "Cabo Verde"){ echo "Cabo Verde";} ?> </option>
								      	</select></td>
							    	</tr>
							        
									<tr>
							          	<td><div align="right"><b>Cidade:</b></div></td>
							          	<td><input name="city" type="text" id="city" value="<?php echo "$city"; ?>" size="30" maxlength="255" /></td>
							        </tr>
									<tr>
							          	<td><div align="right"><b>Website:</b></div></td>
							          	<td><input name="website" type="text" id="website" value="<?php echo "$website"; ?>" size="30" maxlength="255" /></td>
							        </tr>
							        <tr>
							          	<td class="style7"><div align="right"><b>Descrição do Restaurante:</b></div></td>
							          	<br /><br /><td><textarea name="resumee" cols="42" rows="8" id="resumee"><?php echo "$resumee"; ?></textarea></td>
							        </tr>	
							        <tr>	
								        <td><div align="right"><b>Contactos:</b></div></td> 
								        <td><br /><div>     Telefone:</div>
								          	<br /><input name="phone_1" type="number" id="phone_1" value="<?php echo "$phone_1"; ?>" size="30" maxlength="255" /><br />
								          	<br /><input name="phone_2" type="number" id="phone_2" value="<?php echo "$phone_2"; ?>" size="30" maxlength="255" /><br />
								          	<br /><div>     E-mail:</div>
								          	<br /><input name="mail_1" type="email" id="mail_1" value="<?php echo "$mail_1"; ?>" size="30" maxlength="255" /><br />
								          	<br /><input name="mail_2" type="email" id="mail_2" value="<?php echo "$mail_2"; ?>" size="30" maxlength="255" /><br /></td> 
							        	
							        </tr>
							        
							         <tr>
									 	<td>&nbsp;</td>
		        					 	<div id="wrapper" style="text-align: center">    
							          		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							        </tr>
							        
					      		</form>
							</table>		
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


