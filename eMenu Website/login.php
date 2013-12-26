<?php
session_start(); 
// Must start session first thing
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// See if they are a logged in member by checking Session data

	$toplinks = '<a href="join_form.php">Registar</a> &bull; <a href="login.php">Entrar</a>';
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
if ($_POST['username']) {
//Connect to the database through our include 
include_once "connect_to_mysql.php";
//$email = stripslashes($_POST['email']);
//$email = strip_tags($email);
$username = stripslashes($_POST['username']);
$username = strip_tags($username);
//$email = mysql_real_escape_string($email);
$password = preg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
$passwordBaseDeDados = $row["pass"];
        //print "Username: $username<br />";
        //print "Password database: $passwordBaseDeDados<br />";
        //print "Password before md5: $password<br />";
$password = md5($password);
        //print "Password after md5: $password<br />";
// Make query and then register all database data that -
// cannot be changed by member into SESSION variables.
// Data that you want member to be able to change -
// should never be set into a SESSION variable.
//$sql = mysql_query("SELECT * FROM members WHERE email='$email' AND emailactivated='1'"); 
$sql = mysql_query("SELECT * FROM members WHERE username='$username' AND pass='$password' AND emailactivated='1'"); 
$sqlB = mysql_query("SELECT * FROM members WHERE username='$username' AND emailactivated='1'"); 
//$sql = mysql_query("SELECT * FROM members WHERE username='$username' AND emailactivated='1'"); 
$login_check = mysql_num_rows($sql);
$login_checkB = mysql_num_rows($sqlB);
        //print "login_check: $login_check<br />";
        //print "login_check with no password: $login_checkB<br />";
	if($login_check > 0)
	{ 
	    while($row = mysql_fetch_array($sql))
	    { 
			// Get member ID into a session variable
	        $id = $row["id"];   
	       // session_register('id'); 
	        $_SESSION['id'] = $id;
	        // Get member username into a session variable
		    $username = $row["username"];   
	        //session_register('username'); 
	        $_SESSION['username'] = $username;
			
		    $restaurant = $row["restaurant"];   
	        //session_register('restaurant'); 
	        $_SESSION['restaurant'] = $restaurant;
			
			
	        // Update last_log_date field for this member now
	        mysql_query("UPDATE members SET lastlogin=now() WHERE id='$id'"); 
	        // Print success message here if all went well then exit the script
			header("location: member_profile.php?id=$id"); 
			$_SESSION['id'] = $id;
			if (!empty($_SESSION['username'])) 
			{
				header("location: member_profile.php?id=$id"); 
					
			} 
			else
			{
				$id=1;
				header("location: member_profile.php?id=$id"); 	
			}
			
			exit();
	    } // close while
	}
	else
	{
		// Print login failure message to the user and link them back to your login page
	  	print '<br /><br /><font color="#FF0000">Dados invalidos. Tente novamente.</font><br />
				<br /><a href="login.php">Clique aqui</a> para voltar ao inicio.';
	  	exit();
	}
}// close if post
?>


<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Iniciar sessão</title>
		<script type="text/javascript">
			<!-- Form Validation -->
			function validate_form ( ) { 
				valid = true; 
				if ( document.logform.username.value == "" ) { 
					alert ( "Please enter your User Name" ); 
					valid = false;
				}
				if ( document.logform.pass.value == "" ) { 
					alert ( "Please enter your password" ); 
					valid = false;
				}
			return valid;
		}
		<!-- Form Validation -->
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
	    						<li><a href="index.php">Inicio</a></li>
	    						<li><a href="restaurant_list.php">Restaurantes</a></li>
	    						<li style="float: right"><?php echo $toplinks; ?></li>
							</ul>
						</nav>

							
						<div id="transparent_box">
													   	
							<div align="center" style="text-align: center">
						       		<div id="title_profile" style="display: inline-block;">Entre na sua conta aqui</div>
							</div>
						   	
						    <table align="center" cellpadding="5">
							 
						    	<form action="login.php" method="post" enctype="multipart/form-data" name="logform" id="logform" onsubmit="return validate_form ( );">
						   		<!-- Form Validation     <tr>
						          <td class="style7"><div align="right">Email Address:</div></td>
						          <td><input name="email" type="text" id="email" size="30" maxlength="64" /></td>
						        </tr>       -->      
							
									<tr>
							   			<td class="style7"><div align="right"><b>Nome de Utilizador:</b></div></td>
							        	<td><input name="username" type="text" id="username" size="30" maxlength="64" /></td>
							 		</tr>
							    	<tr>
							          	<td class="style7"><div align="right"><b>Password:</b></div></td>
							          	<td><input name="password" type="password" id="password" size="30" maxlength="64" /></td>
							        </tr>
							        
							         <tr>
							          	<td>&nbsp;</td>
							  		 	<div id="wrapper" style="text-align: center">    
							          	   	<br /><br /><td><input style="display: inline-block;" class="button" type="submit" name="Submit" value="Entrar" /><br/><br/><br/><br/></td>
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
