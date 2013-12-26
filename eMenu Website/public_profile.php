<?php
session_start(); // Must start session first thing
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// See if they are a logged in member by checking Session data

	$fillresumee = '<div>Não existe informação adicional.</div>';
	$fillcontacts = '<div>Não existe informação adicional.</div>';

	$toplinks = '<a href="join_form.php">Registar</a> &bull; <a href="login.php">Entrar</a>';
	
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
	if ($count > 1) 
	{
		echo "There is no user with that id here.";
		exit();	
	}
	while($row = mysql_fetch_array($sql))
	{
		$restaurant = $row["restaurant"];
		$username = $row["username"];
		$country = $row["country"];
		$city = $row["city"];
		$street = $row["street"];
		$resumee = $row["resumee"];
		$website = $row["website"];
		$phone_1 = $row["phone_1"];
		$phone_2 = $row["phone_2"];
		$mail_1 = $row["mail_1"];
		$mail_2 = $row["mail_2"];
		// Convert the sign up date to be more readable by humans
		$signupdate = strftime("%b %d, %Y", strtotime($row['signupdate']));
		$website_link = '<a style="font-size:35px;" href="' . $website . '">' . $restaurant . '</a>';
		$website_link_b = '<a href="' . $website . '">' . $restaurant . '</a>';
	}
	
	$photo_jpg = 'memberFiles/'. $id .'/pic1.jpg';
	$photo_gif = 'memberFiles/'. $id .'/pic1.gif';
	$photo_png = 'memberFiles/'. $id .'/pic1.png';
	$photo_width= '300';
	
	
	if (file_exists($photo_jpg) == TRUE)
	{
		$photo_tag = '<a href="' .$photo_jpg. '" data-lightbox="image-1" >
		 			<img src="'. $photo_jpg .'" alt="Ad" width="'. $photo_width. '"/>
		 		</a>';
	}
	else if (file_exists($photo_gif) == TRUE)
	{
		$photo_tag = '<a href="' .$photo_gif. '" data-lightbox="image-1" >
		 			<img src="'. $photo_gif .'" alt="Ad" width="'. $photo_width. '"/>
		 		</a>';
	}
	else if (file_exists($photo_png) == TRUE)
	{
		$photo_tag = '<a href="' .$photo_png. '" data-lightbox="image-1" >
		 			<img src="'. $photo_png .'" alt="Ad" width="'. $photo_width. '"/>
		 		</a>';
	}
	else
	{
	  	$photo = 'img/rest.png';
		$photo_width= '0';
		$photo_tag = '<div id="simple_links"><a href="edit_pic.php" >Não existe informação adicional.</a></div>';	
	}
	

?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Perfil</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/titles.css" type="text/css">
		<link href="lightbox/css/lightbox.css" rel="stylesheet" />
		<script src="lightbox/js/jquery-1.10.2.min.js"></script>
		<script src="lightbox/js/lightbox-2.6.min.js"></script>
		<script type="text/javascript">
  			function openImage(imageUrl) 
  			{ 
    			window.open(theURL); 
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
	    						<li><a href="index.php">Inicio</a></li>
	    						<li><a href="restaurant_list.php">Restaurantes</a></li>
	    						<li style="float: right"><?php echo $toplinks; ?></li>
							</ul>
						</nav>

							
						<div id="transparent_box">
					    	
					    					   	
							<div align="center" style="text-align: center">
								<br /><div id="title_profile" style="display: inline-block; font-size:25px;">
						       			Perfil do Restaurante:
						       			<b>
						    				<?php echo '<a href="member_profile.php?id=' . $userid . '">' . $restaurant . '</a>'; ?>
						    			</b>
						       			</div><br /><br /><br />
						       		</a><br /><br />
							</div>
							
							
							<td width="174" valign="top">
		        				<div id="wrapper" style="text-align: center">    
									<div align="center" style="display: inline-block;">
										<?php echo $photo_tag; ?>
									</div>
								</div>
							</td>
							
							
							<div style="padding-left:100px;" >
							    <br /><br /><br /><div id="plate_title">Resumo:</div>
									<div id="simple_links" style="margin-left:150px;">
								    	<?php 	if(!empty($resumee)){
								    		  		echo "<br /> $resumee";
												} 
												else{
												 	echo "<br /> $fillresumee";
												} ?> 
									</div>
									
								<br /><br /><div id="plate_title">Website:</div>
									<div id="simple_links" style="margin-left:150px;">
										<?php echo "$website_link_b"; ?> <br />
									</div>
									
								<br /><br /><div id="plate_title">Localização:</div>
									<div style="margin-left:150px;">
										<?php echo "$street, $city - $country"; ?> <br />
									</div>
							
								<br /><br /><div id="plate_title">Contactos:</div>
									<div id="simple_links" style="margin-left:150px;">
										<?php 	if(!empty($phone_1) || !empty($phone_2)){
													echo "<br /> Telefone(s): <br />";
								    		  		if(!empty($phone_1)){ echo "<br /> &bull; $phone_1";}
								    		  		if(!empty($phone_2)){ echo "<br /> &bull; $phone_2";}
												} 
												if(!empty($mail_1) || !empty($mail_2)){
													echo "<br /><br /> Endereço(s) de e-mail: <br />";
								    		  		if(!empty($mail_1)){ echo "<br /> &bull; $mail_1";}
								    		  		if(!empty($mail_2)){ echo "<br /> &bull; $mail_2";}
												} 
												if(empty($phone_1) && empty($phone_2) && empty($mail_1) && empty($mail_2)){
												 	echo "<br /> $fillcontacts";
												} ?> 
									<br /><br /></div>
									
						       	<div style="color:#AA0000; padding-left:-50px; color=red;" id="title_profile">
						       		<?php echo $checkmenu; ?>
						       	</div>
						
							    
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