<?php
session_start(); 
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// See if they are a logged in member by checking Session data
$toplinks = "";
if (!empty($_SESSION['username'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $restaurant = $_SESSION['restaurant'];
	$empty_Menus = '<a href="edit_plates.php#Menus">Clique para adicionar menus.</a>';
	$empty_Entradas = '<a href="edit_plates.php#Entradas">Clique para adicionar entradas.</a>';
	$empty_Carne = '<a href="edit_plates.php#Carne">Clique para adicionar pratos de carne.</a>';
	$empty_Peixe = '<a href="edit_plates.php#Peixe">Clique para adicionar pratos de peixe.</a>';
	$empty_Outros = '<a href="edit_plates.php#Outros">Clique para adicionar outros pratos.</a>';
	$empty_Sobremesas = '<a href="edit_plates.php#Sobremesas">Clique para adicionar sobremesas.</a>';
	$empty_Bebidas = '<a href="edit_plates.php#Bebidas">Clique para adicionar bebidas.</a>';
	$account_menu = '<a href="edit_plates.php">Clique para adicionar menus.</a>';
	$fillresumee = '<a href="edit_info.php">Clique para adicionar um resumo do restaurante.</a>';
	$restaurant_link = '<a href="#" onClick="myFunction()">Restaurantes</a>';
} else {
	#header("Location: non private index");
	$userid = "1";
	$restaurant_link = '<a href="restaurant_list.php">Restaurantes</a>';
	echo 'Please <a href="login.php">Entrar</a>';
}

// Use the URL 'id' variable to set who we want to query info about
#$id = ereg_replace("[^0-9]", "", $_GET['id']); // filter everything but numbers for security
#if ($id == "") {
#	echo "Missing Data to Run";
#	exit();
#}

//Connect to the database through our include 
include_once "connect_to_mysql.php";
// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM members WHERE id='$userid' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count > 1) {
	echo "There is no user with that id here.";
	exit();	
}
while($row = mysql_fetch_array($sql)){
	$restaurant = $row["restaurant"];
	$username = $row["username"];
	$country = $row["country"];
	$city = $row["city"];
	$website = $row["website"];
	$resumee = $row["resumee"];
	
	$menu_0 = $row["menu_0"];
	$menu_1 = $row["menu_1"];
	$menu_2 = $row["menu_2"];
	$menu_3 = $row["menu_3"];
	$menu_4 = $row["menu_4"];
	$menu_5 = $row["menu_5"];
	$menu_6 = $row["menu_6"];
	$menu_7 = $row["menu_7"];
	$menu_8 = $row["menu_8"];
	$menu_9 = $row["menu_9"];
	
	$p_menu_0 = $row["p_menu_0"];
	$p_menu_1 = $row["p_menu_1"];
	$p_menu_2 = $row["p_menu_2"];
	$p_menu_3 = $row["p_menu_3"];
	$p_menu_4 = $row["p_menu_4"];
	$p_menu_5 = $row["p_menu_5"];
	$p_menu_6 = $row["p_menu_6"];
	$p_menu_7 = $row["p_menu_7"];
	$p_menu_8 = $row["p_menu_8"];
	$p_menu_9 = $row["p_menu_9"];
	
	$entry_0 = $row["entry_0"];
	$entry_1 = $row["entry_1"];
	$entry_2 = $row["entry_2"];
	$entry_3 = $row["entry_3"];
	$entry_4 = $row["entry_4"];
	$entry_5 = $row["entry_5"];
	$entry_6 = $row["entry_6"];
	$entry_7 = $row["entry_7"];
	$entry_8 = $row["entry_8"];
	$entry_9 = $row["entry_9"];
	
	$p_entry_0 = $row["p_entry_0"];
	$p_entry_1 = $row["p_entry_1"];
	$p_entry_2 = $row["p_entry_2"];
	$p_entry_3 = $row["p_entry_3"];
	$p_entry_4 = $row["p_entry_4"];
	$p_entry_5 = $row["p_entry_5"];
	$p_entry_6 = $row["p_entry_6"];
	$p_entry_7 = $row["p_entry_7"];
	$p_entry_8 = $row["p_entry_8"];
	$p_entry_9 = $row["p_entry_9"];
	
	$meat_0 = $row["meat_0"];
	$meat_1 = $row["meat_1"];
	$meat_2 = $row["meat_2"];
	$meat_3 = $row["meat_3"];
	$meat_4 = $row["meat_4"];
	$meat_5 = $row["meat_5"];
	$meat_6 = $row["meat_6"];
	$meat_7 = $row["meat_7"];
	$meat_8 = $row["meat_8"];
	$meat_9 = $row["meat_9"];
	$meat_0 = $row["meat_0"];
	
	$p_meat_0 = $row["p_meat_0"];
	$p_meat_1 = $row["p_meat_1"];
	$p_meat_2 = $row["p_meat_2"];
	$p_meat_3 = $row["p_meat_3"];
	$p_meat_4 = $row["p_meat_4"];
	$p_meat_5 = $row["p_meat_5"];
	$p_meat_6 = $row["p_meat_6"];
	$p_meat_7 = $row["p_meat_7"];
	$p_meat_8 = $row["p_meat_8"];
	$p_meat_9 = $row["p_meat_9"];
	$p_meat_0 = $row["p_meat_0"];
	
	$fish_0 = $row["fish_0"];
	$fish_1 = $row["fish_1"];
	$fish_2 = $row["fish_2"];
	$fish_3 = $row["fish_3"];
	$fish_4 = $row["fish_4"];
	$fish_5 = $row["fish_5"];
	$fish_6 = $row["fish_6"];
	$fish_7 = $row["fish_7"];
	$fish_8 = $row["fish_8"];
	$fish_9 = $row["fish_9"];
	
	$p_fish_0 = $row["p_fish_0"];
	$p_fish_1 = $row["p_fish_1"];
	$p_fish_2 = $row["p_fish_2"];
	$p_fish_3 = $row["p_fish_3"];
	$p_fish_4 = $row["p_fish_4"];
	$p_fish_5 = $row["p_fish_5"];
	$p_fish_6 = $row["p_fish_6"];
	$p_fish_7 = $row["p_fish_7"];
	$p_fish_8 = $row["p_fish_8"];
	$p_fish_9 = $row["p_fish_9"];
	
	$other_0 = $row["other_0"];
	$other_1 = $row["other_1"];
	$other_2 = $row["other_2"];
	$other_3 = $row["other_3"];
	$other_4 = $row["other_4"];
	$other_5 = $row["other_5"];
	$other_6 = $row["other_6"];
	$other_7 = $row["other_7"];
	$other_8 = $row["other_8"];
	$other_9 = $row["other_9"];
	
	$p_other_0 = $row["p_other_0"];
	$p_other_1 = $row["p_other_1"];
	$p_other_2 = $row["p_other_2"];
	$p_other_3 = $row["p_other_3"];
	$p_other_4 = $row["p_other_4"];
	$p_other_5 = $row["p_other_5"];
	$p_other_6 = $row["p_other_6"];
	$p_other_7 = $row["p_other_7"];
	$p_other_8 = $row["p_other_8"];
	$p_other_9 = $row["p_other_9"];
	
	$desert_0 = $row["desert_0"];
	$desert_1 = $row["desert_1"];
	$desert_2 = $row["desert_2"];
	$desert_3 = $row["desert_3"];
	$desert_4 = $row["desert_4"];
	$desert_5 = $row["desert_5"];
	$desert_6 = $row["desert_6"];
	$desert_7 = $row["desert_7"];
	$desert_8 = $row["desert_8"];
	$desert_9 = $row["desert_9"];
	
	$p_desert_0 = $row["p_desert_0"];
	$p_desert_1 = $row["p_desert_1"];
	$p_desert_2 = $row["p_desert_2"];
	$p_desert_3 = $row["p_desert_3"];
	$p_desert_4 = $row["p_desert_4"];
	$p_desert_5 = $row["p_desert_5"];
	$p_desert_6 = $row["p_desert_6"];
	$p_desert_7 = $row["p_desert_7"];
	$p_desert_8 = $row["p_desert_8"];
	$p_desert_9 = $row["p_desert_9"];
	
	$drink_0 = $row["drink_0"];
	$drink_1 = $row["drink_1"];
	$drink_2 = $row["drink_2"];
	$drink_3 = $row["drink_3"];
	$drink_4 = $row["drink_4"];
	$drink_5 = $row["drink_5"];
	$drink_6 = $row["drink_6"];
	$drink_7 = $row["drink_7"];
	$drink_8 = $row["drink_8"];
	$drink_9 = $row["drink_9"];
	
	$p_drink_0 = $row["p_drink_0"];
	$p_drink_1 = $row["p_drink_1"];
	$p_drink_2 = $row["p_drink_2"];
	$p_drink_3 = $row["p_drink_3"];
	$p_drink_4 = $row["p_drink_4"];
	$p_drink_5 = $row["p_drink_5"];
	$p_drink_6 = $row["p_drink_6"];
	$p_drink_7 = $row["p_drink_7"];
	$p_drink_8 = $row["p_drink_8"];
	$p_drink_9 = $row["p_drink_9"];
	 
	// Convert the sign up date to be more readable by humans
	$signupdate = strftime("%b %d, %Y", strtotime($row['signupdate']));
	$website_link = '<a style="font-size:25px;" href="' . $website . '">' . $restaurant . '</a>';
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
		<title>Perfil de Membro</title>
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
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
	    						<li><a href="index.php">Inicio</a></li>
	    						<li><?php echo $restaurant_link; ?></li>
	    						<li style="float: right"><?php echo $toplinks; ?></li>
							</ul>
						</nav>

							
						<div id="transparent_box">
					    	
					    				
					    					   	
							<div align="center" style="text-align: center">
						      	<br /><div id="title_profile" style="display: inline-block; font-size:25px;">
						       			Ementa do Restaurante:
						       			<b>
						    				<?php echo '<a href="member_profile.php?id=' . $userid . '">' . $restaurant . '</a>'; ?>
						    			</b>
						       			</div><br /><br /><br />
						       		</a>
							</div>
							
							<div style="padding-left:100px;" >
							
						
							    <br /><br /><div id="plate_title">Menus:</div>
									<div style="margin-left:150px;" id="simple_links">
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_0)){echo "$p_menu_0 €";} ?></span>
										<?php if(!empty($menu_0)){ echo "&bull; $menu_0<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_1)){echo "$p_menu_1 €";} ?></span>
										<?php if(!empty($menu_1)){ echo "&bull; $menu_1<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_2)){echo "$p_menu_2 €";} ?></span>
										<?php if(!empty($menu_2)){ echo "&bull; $menu_2<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_3)){echo "$p_menu_3 €";} ?></span>
										<?php if(!empty($menu_3)){ echo "&bull; $menu_3<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_4)){echo "$p_menu_4 €";} ?></span>
										<?php if(!empty($menu_4)){ echo "&bull; $menu_4<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_5)){echo "$p_menu_5 €";} ?></span>
										<?php if(!empty($menu_5)){ echo "&bull; $menu_5<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_6)){echo "$p_menu_6 €";} ?></span>
										<?php if(!empty($menu_6)){ echo "&bull; $menu_6<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_7)){echo "$p_menu_7 €";} ?></span>
										<?php if(!empty($menu_7)){ echo "&bull; $menu_7<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_8)){echo "$p_menu_8 €";} ?></span>
										<?php if(!empty($menu_8)){ echo "&bull; $menu_8<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($menu_9)){echo "$p_menu_9 €";} ?></span>
										<?php if(!empty($menu_9)){ echo "&bull; $menu_9<br /><br />";} ?></td></tr></table>
											
								    	<?php if(empty($menu_0) && empty($menu_1) && empty($menu_2) && empty($menu_3) &&
											empty($menu_4) && empty($menu_5) && empty($menu_6) &&
											empty($menu_7) && empty($menu_8) && empty($menu_9) ){
												 echo "Lista vazia! $empty_Menus";
											} ?> 
									</div>	
									
							    <br /><br /><div id="plate_title">Entradas:</div>
									<div style="margin-left:150px;" id="simple_links">
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_0)){echo "$p_entry_0 €";} ?></span>
										<?php if(!empty($entry_0)){ echo "&bull; $entry_0<br /><br />";} ?></td></tr></table>
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_1)){echo "$p_entry_1 €";} ?></span>
										<?php if(!empty($entry_1)){ echo "&bull; $entry_1<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_2)){echo "$p_entry_2 €";} ?></span>
										<?php if(!empty($entry_2)){ echo "&bull; $entry_2<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_3)){echo "$p_entry_3 €";} ?></span>
										<?php if(!empty($entry_3)){ echo "&bull; $entry_3<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_4)){echo "$p_entry_4 €";} ?></span>
										<?php if(!empty($entry_4)){ echo "&bull; $entry_4<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_5)){echo "$p_entry_5 €";} ?></span>
										<?php if(!empty($entry_5)){ echo "&bull; $entry_5<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_6)){echo "$p_entry_6 €";} ?></span>
										<?php if(!empty($entry_6)){ echo "&bull; $entry_6<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_7)){echo "$p_entry_7 €";} ?></span>
										<?php if(!empty($entry_7)){ echo "&bull; $entry_7<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_8)){echo "$p_entry_8 €";} ?></span>
										<?php if(!empty($entry_8)){ echo "&bull; $entry_8<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($entry_9)){echo "$p_entry_9 €";} ?></span>
										<?php if(!empty($entry_9)){ echo "&bull; $entry_9<br /><br />";} ?></td></tr></table>
										
									
								    	<?php if(empty($entry_0) && empty($entry_1) && empty($entry_2) && empty($entry_3) &&
											empty($entry_4) && empty($entry_5) && empty($entry_6) &&
											empty($entry_7) && empty($entry_8) && empty($entry_9) ){
												 echo "Lista vazia! $empty_Entradas";
											} ?> 
									</div>
									
							 	<br /><br /><div id="plate_title">Pratos de Carne:</div>
									<div style="margin-left:150px;" id="simple_links">
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_0)){echo "$p_meat_0 €";} ?></span>
										<?php if(!empty($meat_0)){ echo "&bull; $meat_0<br /><br />";} ?></td></tr></table>
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_1)){echo "$p_meat_1 €";} ?></span>
										<?php if(!empty($meat_1)){ echo "&bull; $meat_1<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_2)){echo "$p_meat_2 €";} ?></span>
										<?php if(!empty($meat_2)){ echo "&bull; $meat_2<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_3)){echo "$p_meat_3 €";} ?></span>
										<?php if(!empty($meat_3)){ echo "&bull; $meat_3<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_4)){echo "$p_meat_4 €";} ?></span>
										<?php if(!empty($meat_4)){ echo "&bull; $meat_4<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_5)){echo "$p_meat_5 €";} ?></span>
										<?php if(!empty($meat_5)){ echo "&bull; $meat_5<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_6)){echo "$p_meat_6 €";} ?></span>
										<?php if(!empty($meat_6)){ echo "&bull; $meat_6<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_7)){echo "$p_meat_7 €";} ?></span>
										<?php if(!empty($meat_7)){ echo "&bull; $meat_7<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_8)){echo "$p_meat_8 €";} ?></span>
										<?php if(!empty($meat_8)){ echo "&bull; $meat_8<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($meat_9)){echo "$p_meat_9 €";} ?></span>
										<?php if(!empty($meat_9)){ echo "&bull; $meat_9<br /><br />";} ?></td></tr></table>
										
										
							 			<?php if(empty($meat_0) && empty($meat_1) && empty($meat_2) && empty($meat_3) &&
											empty($meat_4) && empty($meat_5) && empty($meat_6) &&
											empty($meat_7) && empty($meat_8) && empty($meat_9) ){
												 echo "Lista vazia! $empty_Carne"; print '<br /><br />';
											} ?> 
									</div>
									
					      		<br /><br /><div id="plate_title">Pratos de Peixe:</div> 
									<div style="margin-left:150px;" id="simple_links">
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_0)){echo "$p_fish_0 €";} ?></span>
										<?php if(!empty($fish_0)){ echo "&bull; $fish_0<br /><br />";} ?></td></tr></table>
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_1)){echo "$p_fish_1 €";} ?></span>
										<?php if(!empty($fish_1)){ echo "&bull; $fish_1<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_2)){echo "$p_fish_2 €";} ?></span>
										<?php if(!empty($fish_2)){ echo "&bull; $fish_2<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_3)){echo "$p_fish_3 €";} ?></span>
										<?php if(!empty($fish_3)){ echo "&bull; $fish_3<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_4)){echo "$p_fish_4 €";} ?></span>
										<?php if(!empty($fish_4)){ echo "&bull; $fish_4<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_5)){echo "$p_fish_5 €";} ?></span>
										<?php if(!empty($fish_5)){ echo "&bull; $fish_5<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_6)){echo "$p_fish_6 €";} ?></span>
										<?php if(!empty($fish_6)){ echo "&bull; $fish_6<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_7)){echo "$p_fish_7 €";} ?></span>
										<?php if(!empty($fish_7)){ echo "&bull; $fish_7<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_8)){echo "$p_fish_8 €";} ?></span>
										<?php if(!empty($fish_8)){ echo "&bull; $fish_8<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($fish_9)){echo "$p_fish_9 €";} ?></span>
										<?php if(!empty($fish_9)){ echo "&bull; $fish_9<br /><br />";} ?></td></tr></table>
										
										<?php if(empty($fish_0) && empty($fish_1) && empty($fish_2) && empty($fish_3) &&
											empty($fish_4) && empty($fish_5) && empty($fish_6) &&
											empty($fish_7) && empty($fish_8) && empty($fish_9) ){
												 echo "Lista vazia! $empty_Peixe"; print '<br /><br />';
											} ?> 
									</div>
									
							    <br /><br /><div id="plate_title">Outros Pratos:</div>
									<div style="margin-left:150px;" id="simple_links">
								     
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_0)){echo "$p_other_0 €";} ?></span>
										<?php if(!empty($other_0)){ echo "&bull; $other_0<br /><br />";} ?></td></tr></table>
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_1)){echo "$p_other_1 €";} ?></span>
										<?php if(!empty($other_1)){ echo "&bull; $other_1<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_2)){echo "$p_other_2 €";} ?></span>
										<?php if(!empty($other_2)){ echo "&bull; $other_2<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_3)){echo "$p_other_3 €";} ?></span>
										<?php if(!empty($other_3)){ echo "&bull; $other_3<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_4)){echo "$p_other_4 €";} ?></span>
										<?php if(!empty($other_4)){ echo "&bull; $other_4<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_5)){echo "$p_other_5 €";} ?></span>
										<?php if(!empty($other_5)){ echo "&bull; $other_5<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_6)){echo "$p_other_6 €";} ?></span>
										<?php if(!empty($other_6)){ echo "&bull; $other_6<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_7)){echo "$p_other_7 €";} ?></span>
										<?php if(!empty($other_7)){ echo "&bull; $other_7<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_8)){echo "$p_other_8 €";} ?></span>
										<?php if(!empty($other_8)){ echo "&bull; $other_8<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($other_9)){echo "$p_other_9 €";} ?></span>
										<?php if(!empty($other_9)){ echo "&bull; $other_9<br /><br />";} ?></td></tr></table>
										

								      	<?php if(empty($other_0) && empty($other_1) && empty($other_2) && empty($other_3) &&
											empty($other_4) && empty($other_5) && empty($other_6) &&
											empty($other_7) && empty($other_8) && empty($other_9) ){
												echo "Lista vazia! $empty_Outros"; print '<br /><br />';
											} ?> 
									</div>
									
							    <br /><br /><div id="plate_title">Sobremesas:</div>
									<div style="margin-left:150px;" id="simple_links">
														      	
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_0)){echo "$p_desert_0 €";} ?></span>
										<?php if(!empty($desert_0)){ echo "&bull; $desert_0<br /><br />";} ?></td></tr></table>
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_1)){echo "$p_desert_1 €";} ?></span>
										<?php if(!empty($desert_1)){ echo "&bull; $desert_1<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_2)){echo "$p_desert_2 €";} ?></span>
										<?php if(!empty($desert_2)){ echo "&bull; $desert_2<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_3)){echo "$p_desert_3 €";} ?></span>
										<?php if(!empty($desert_3)){ echo "&bull; $desert_3<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_4)){echo "$p_desert_4 €";} ?></span>
										<?php if(!empty($desert_4)){ echo "&bull; $desert_4<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_5)){echo "$p_desert_5 €";} ?></span>
										<?php if(!empty($desert_5)){ echo "&bull; $desert_5<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_6)){echo "$p_desert_6 €";} ?></span>
										<?php if(!empty($desert_6)){ echo "&bull; $desert_6<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_7)){echo "$p_desert_7 €";} ?></span>
										<?php if(!empty($desert_7)){ echo "&bull; $desert_7<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_8)){echo "$p_desert_8 €";} ?></span>
										<?php if(!empty($desert_8)){ echo "&bull; $desert_8<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($desert_9)){echo "$p_desert_9 €";} ?></span>
										<?php if(!empty($desert_9)){ echo "&bull; $desert_9<br /><br />";} ?></td></tr></table>
										

								      	<?php if(empty($desert_0) && empty($desert_1) && empty($desert_2) && empty($desert_3) &&
											empty($desert_4) && empty($desert_5) && empty($desert_6) &&
											empty($desert_7) && empty($desert_8) && empty($desert_9) ){
												 echo "Lista vazia! $empty_Sobremesas"; print '<br /><br />';
											} ?> 
									</div>
									
							    <br /><br /><div id="plate_title">Bebidas:</div>
									<div style="margin-left:150px;" id="simple_links">
								      	
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_0)){echo "$p_drink_0 €";} ?></span>
										<?php if(!empty($drink_0)){ echo "&bull; $drink_0<br /><br />";} ?></td></tr></table>
										
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_1)){echo "$p_drink_1 €";} ?></span>
										<?php if(!empty($drink_1)){ echo "&bull; $drink_1<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_2)){echo "$p_drink_2 €";} ?></span>
										<?php if(!empty($drink_2)){ echo "&bull; $drink_2<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_3)){echo "$p_drink_3 €";} ?></span>
										<?php if(!empty($drink_3)){ echo "&bull; $drink_3<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_4)){echo "$p_drink_4 €";} ?></span>
										<?php if(!empty($drink_4)){ echo "&bull; $drink_4<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_5)){echo "$p_drink_5 €";} ?></span>
										<?php if(!empty($drink_5)){ echo "&bull; $drink_5<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_6)){echo "$p_drink_6 €";} ?></span>
										<?php if(!empty($drink_6)){ echo "&bull; $drink_6<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_7)){echo "$p_drink_7 €";} ?></span>
										<?php if(!empty($drink_7)){ echo "&bull; $drink_7<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_8)){echo "$p_drink_8 €";} ?></span>
										<?php if(!empty($drink_8)){ echo "&bull; $drink_8<br /><br />";} ?></td></tr></table>
											
										<table width="75%" cellspacing="0" cellpadding="0"><tr><td>
											<span style="float:right;"><?php if(!empty($drink_9)){echo "$p_drink_9 €";} ?></span>
										<?php if(!empty($drink_9)){ echo "&bull; $drink_9<br /><br />";} ?></td></tr></table>
										
						
								      	<?php if(empty($drink_0) && empty($drink_1) && empty($drink_2) && empty($drink_3) &&
											empty($drink_4) && empty($drink_5) && empty($drink_6) &&
											empty($drink_7) && empty($drink_8) && empty($drink_9) ){
												echo "Lista vazia! $empty_Bebidas"; print '<br /><br />';
										} ?> 
									</div>
								
								
								<div align="center" style="text-align: center">
						      		<div  id="simple_links" style="display: inline-block; font-size:15px;">
						     		 	<br /><br /><br /><a href="edit_plates.php">Clique para adicionar/actualizar pratos.</a><br /><br />
									</div>
								</div>	
									
							    <br /><br /><br /><div style="float: right"><b>Data de registo: </b><?php echo "$signupdate"; ?></div><br /><br /><br />
							    
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