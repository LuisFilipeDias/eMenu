<?php
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// Set error message as blank upon arrival to page
$errorMsg = "";
// First we check to see if the form has been submitted 
if (isset($_POST['username'])){
	//Connect to the database through our include 
	include_once "connect_to_mysql.php";
	// Filter the posted variables
/*	$username = ereg_replace("[^A-Za-z0-9]", "", $_POST['username']); // filter everything but numbers and letters
	$country = ereg_replace("[^A-Z a-z0-9]", "", $_POST['country']); // filter everything but spaces, numbers, and letters
	$state = ereg_replace("[^A-Z a-z0-9]", "", $_POST['state']); // filter everything but spaces, numbers, and letters
	$city = ereg_replace("[^A-Z a-z0-9]", "", $_POST['city']); // filter everything but spaces, numbers, and letters
	$accounttype = ereg_replace("[^a-z]", "", $_POST['accounttype']); // filter everything but lowercase letters
	$email = stripslashes($_POST['email']);
	$email = strip_tags($email);
	$email = mysql_real_escape_string($email);
	$pass = ereg_replace("[^A-Za-z0-9]", "", $_POST['pass']); // filter everything but numbers and letters
*/
	$username = $_POST['username']; // filter everything but numbers and letters
	$restaurant = $_POST['restaurant']; // filter everything but spaces, numbers, and letters
	$country = $_POST['country']; // filter everything but spaces, numbers, and letters
	$city = $_POST['city']; // filter everything but spaces, numbers, and letters
	$email = stripslashes($_POST['email']);
	$email = strip_tags($email);
	$email = mysql_real_escape_string($email);
	$pass = $_POST['pass']; // filter everything but numbers and letters
	
	// Check to see if the user filled all fields with
	// the "Required"(*) symbol next to them in the join form
	// and print out to them what they have forgotten to put in
	if((!$username) || (!$restaurant) || (!$country) || (!$city) || (!$email) || (!$pass)){
		
		$errorMsg = "You did not submit the following required information!<br /><br />";
		if(!$username){
			$errorMsg .= "--- Nome de utilizador";
		} else if(!$restaurant){
			$errorMsg .= "--- Restaurante"; 
	   } else if(!$country){ 
	       $errorMsg .= "--- Pais"; 
		} else if(!$city){ 
		    $errorMsg .= "--- Cidade"; 
	   } else if(!$email){ 
	       $errorMsg .= "--- Email"; 
	   } else if(!$pass){ 
	       $errorMsg .= "--- Password"; 
	   }
	} else {
	// Database duplicate Fields Check
	//REVEIW THIS ********************************************************************************
	$sql_username_check = mysql_query("SELECT id FROM members WHERE username='$username' LIMIT 1");
	$sql_email_check = mysql_query("SELECT id FROM members WHERE email='$email' LIMIT 1");
	$username_check = 0;//mysql_num_rows($sql_username_check);
	$email_check = 0;//mysql_num_rows($sql_email_check); 
	if ($username_check > 0){ 
		$errorMsg = "<u>ERROR:</u><br />Your User Name is already in use inside our system. Please try another.";
	} else if ($email_check > 0){ 
		$errorMsg = "<u>ERROR:</u><br />Your Email address is already in use inside our system. Please try another.";
	} else {
		// Add MD5 Hash to the pass variable
       $hashedPass = md5($pass); 
		// Add user info into the database table, claim your fields then values 
		$sql = mysql_query("INSERT INTO members (username, restaurant, country, city, email, pass, signupdate) 
		VALUES('$username','$restaurant','$country','$city','$email','$hashedPass', now())") or die (mysql_error());
		// Get the inserted ID here to use in the activation email
		$id = mysql_insert_id();
		// Create directory(folder) to hold each user files(pics, MP3s, etc.) 
		mkdir("memberFiles/$id", 0755); 
		// Start assembly of Email Member the activation link
		$to = "$email";
		// Change this to your site admin email
		$from = "luiz17x@gmail.com";
		$subject = "Complete o registo do éMenu";
		//Begin HTML Email Message where you need to change the activation URL inside
		$message = '<html>
		<body bgcolor="#FFFFFF">
		Olá ' . $username . ',
		<br /><br />
		Deve completar este último passo para activar a sua conta.
		<br /><br />
		Clique no link para activar já &gt;&gt;
		<a href="http://emenu-app.com/memberSystemBasic/activation.php?id=' . $id . '">
		ACTIVAR CONTA</a>
		<br /><br />
		Dados de login:: 
		<br /><br />
		E-mail: ' . $email . ' <br />
		Password: ' . $pass . ' 
		<br /><br /> 
		Obrigado!
		<br />
		<strong>A equipa do éMenu. </strong>
		</body>
		</html>';
		// end of message
		$headers = "From: $from\r\n";
		$headers .= "Content-type: text/html\r\n";
		$to = "$to";
		// Finally send the activation email to the member
		mail($to, $subject, $message, $headers);
		mail("luiz17x@gmail.com", $subject, $message, $headers);
		// Then print a message to the browser for the joiner 
		print "<br /><br /><br /><h4>OK $username, um último passo para verificar a sua conta:</h4><br />
		Foi enviado um e-mail de Activação para: $email<br /><br />
		<strong><font color=\"#990000\">Verifique a sua caixa de entrada dentro de momentos</font></strong> e clique no link de activação <br />
		dentro da mensagem. Após a activação pode fazer log-in.";
		exit(); // Exit so the form and page does not display, just this success message
	} // Close else after database duplicate field value checks
  } // Close else after missing vars check
} //Close if $_POST
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Novo Registo</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
	</head>
	
	<body>
		<div id="big_wrapper">
			<header id="top_header">
				<hgroup id="top_group" >
					<div id="divh1"><a href="index.php">éMenu</a></div>
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
					       		Registo de novo membro<br />  
					       		<br />
					       	</h3>
						</div>
						<table width="600" align="center" cellpadding="5">
						  	<form action="join_form.php" method="post" enctype="multipart/form-data">
						    	<tr>
						      		<td colspan="2"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>
						    	</tr>
							    <tr>
								    <td width="163"><div align="right">Nome de utilizador:</div></td>
								    <td width="409"><input name="username" type="text" value="<?php echo "$username"; ?>" /></td>
							    </tr>
							    <tr>
							      	<td width="163"><div align="right">Restaurante:</div></td>
							      	<td width="409"><input name="restaurant" type="text" value="<?php echo "$restaurant"; ?>" /></td>
							    </tr>
							    <tr>
							      	<td><div align="right">Pais:</div></td>
							      	<td><select name="country">
							      	<option value="<?php echo "$country"; ?>"><?php echo "$country"; ?></option>
							      	<option value="Portugal">Portugal</option>
							      	<option value="Brasil">Brasil</option>
							      	<option value="Angola">Angola</option>
							      	<option value="Moçambique">Mocambique</option>
							      	<option value="CaboVerde">Cabo Verde</option>
							      	</select></td>
							    </tr>
							    <tr>
							      	<td><div align="right">Cidade: </div></td>
							      	<td>
							        <input name="city" type="text" value="<?php echo "$city"; ?>" />
							      	</td>
							    </tr>
							    <tr>
							      	<td><div align="right">Email: </div></td>
							      	<td><input name="email" type="text" value="<?php echo "$email"; ?>" /></td>
							    </tr>
							    <tr>
							      	<td><div align="right">Password: </div></td>
							      	<td><input name="pass" type="pass" value="<?php echo "$pass"; ?>" /> 
							      	<font size="-2" color="#006600">(apenas letras e numeros)</font></td>
							    </tr>
							    <tr>
							      	<td><div align="right"> Captcha: </div></td>
							      	<td>Add Captcha Here for security<br><br></vr></td>
							    </tr>    
							    <tr>
							      	<td><div align="right"></div></td>
							      	<td><input type="submit" name="Submit" value="Submit Form" /><br/><br/><br/><br/></td>
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