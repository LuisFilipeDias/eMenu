<?php
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
$password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
$passwordOriginal = $password;
$password = md5($password);
// Make query and then register all database data that -
// cannot be changed by member into SESSION variables.
// Data that you want member to be able to change -
// should never be set into a SESSION variable.
//$sql = mysql_query("SELECT * FROM members WHERE email='$email' AND emailactivated='1'"); 
//$sql2 = mysql_query("SELECT * FROM members WHERE username='$username' AND password='$password' AND emailactivated='1'"); 
$sql = mysql_query("SELECT * FROM members WHERE username='$username' AND emailactivated='1'"); 
$login_check = mysql_num_rows($sql);
        print "login_check: $login_check<br />";
        print "Password: $password<br />";
        print "Username: $username<br />";
if($login_check > 0){ 
    while($row = mysql_fetch_array($sql)){ 
		// Get member ID into a session variable
        $id = $row["id"];   
        session_register('id'); 
        $_SESSION['id'] = $id;
        // Get member username into a session variable
	    $username = $row["username"];   
        session_register('username'); 
        $_SESSION['username'] = $username;
        // Update last_log_date field for this member now
        mysql_query("UPDATE members SET lastlogin=now() WHERE id='$id'"); 
        // Print success message here if all went well then exit the script
		header("location: member_profile.php?id=$id"); 
		exit();
    } // close while
} else {
        print "PasswordC: $password <br />";
// Print login failure message to the user and link them back to your login page
  print '<br /><br /><font color="#FF0000">No match in our records, try again </font><br />
<br /><a href="login.php">Click here</a> to go back to the login page.';
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

							
						<div align="center" style="padding-left:100px; padding-top:20px">
					      	<h3>
					       		Entre na sua conta aqui:<br />  
					       		<br />
					       	</h3>
					   	</div>
					    <table align="center" cellpadding="5">
						 
					    	<form action="login.php" method="post" enctype="multipart/form-data" name="logform" id="logform" onsubmit="return validate_form ( );">
					   		<!-- Form Validation     <tr>
					          <td class="style7"><div align="right">Email Address:</div></td>
					          <td><input name="email" type="text" id="email" size="30" maxlength="64" /></td>
					        </tr>       -->      
						
								<tr>
						   			<td class="style7"><div align="right">Nome de Utilizador:</div></td>
						        	<td><input name="username" type="text" id="username" size="30" maxlength="64" /></td>
						 		</tr>
						    	<tr>
						          	<td class="style7"><div align="right">Password:</div></td>
						          	<td><input name="password" type="password" id="password" size="30" maxlength="24" /></td>
						        </tr>
						        <tr>
						          	<td>&nbsp;</td>
						          	<td><input name="Submit" type="submit" value="Login" /><br/><br/><br/><br/><br/></td>
						        </tr>
					      	</form>
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
