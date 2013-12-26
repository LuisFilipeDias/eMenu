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
$username = $_SESSION['username'];
// Process the form if it is submitted
if ($_POST['menu_0'] 	|| $_POST['menu_1'] 	|| $_POST['menu_2'] 	|| $_POST['menu_3'] 	|| $_POST['menu_4'] 	|| 
 	$_POST['menu_5'] 	|| $_POST['menu_6'] 	|| $_POST['menu_7'] 	|| $_POST['menu_8'] 	|| $_POST['menu_9'] 	||
 	$_POST['entry_0'] 	|| $_POST['entry_1'] 	|| $_POST['entry_2'] 	|| $_POST['entry_3'] 	|| $_POST['entry_4'] 	|| 
 	$_POST['entry_5'] 	|| $_POST['entry_6'] 	|| $_POST['entry_7'] 	|| $_POST['entry_8'] 	|| $_POST['entry_9'] 	||
 	$_POST['meat_0'] 	|| $_POST['meat_1'] 	|| $_POST['meat_2'] 	|| $_POST['meat_3'] 	|| $_POST['meat_4'] 	||
 	$_POST['meat_5'] 	|| $_POST['meat_6'] 	|| $_POST['meat_7'] 	|| $_POST['meat_8'] 	|| $_POST['meat_9'] 	||
 	$_POST['fish_0'] 	|| $_POST['fish_1'] 	|| $_POST['fish_2'] 	|| $_POST['fish_3'] 	|| $_POST['fish_4'] 	|| 
 	$_POST['fish_5'] 	|| $_POST['fish_6'] 	|| $_POST['fish_7'] 	|| $_POST['fish_8'] 	|| $_POST['fish_9'] 	||
 	$_POST['other_0'] 	|| $_POST['other_1'] 	|| $_POST['other_2'] 	|| $_POST['other_3'] 	|| $_POST['other_4'] 	||
 	$_POST['other_5'] 	|| $_POST['other_6'] 	|| $_POST['other_7'] 	|| $_POST['other_8'] 	|| $_POST['other_9'] 	||
 	$_POST['desert_0'] 	|| $_POST['desert_1'] 	|| $_POST['desert_2'] 	|| $_POST['desert_3'] 	|| $_POST['desert_4'] 	||
 	$_POST['desert_5'] 	|| $_POST['desert_6'] 	|| $_POST['desert_7'] 	|| $_POST['desert_8'] 	|| $_POST['desert_9'] 	||
 	$_POST['drink_0'] 	|| $_POST['drink_1'] 	|| $_POST['drink_2'] 	|| $_POST['drink_3'] 	|| $_POST['drink_4'] 	||
 	$_POST['drink_5'] 	|| $_POST['drink_6'] 	|| $_POST['drink_7'] 	|| $_POST['drink_8'] 	|| $_POST['drink_9'] 	|| 
 	$_POST['p_menu_0'] 	|| $_POST['p_menu_1'] 	|| $_POST['p_menu_2'] 	|| $_POST['p_menu_3'] 	|| $_POST['p_menu_4'] 	|| 
 	$_POST['p_menu_5'] 	|| $_POST['p_menu_6'] 	|| $_POST['p_menu_7'] 	|| $_POST['p_menu_8'] 	|| $_POST['p_menu_9'] 	||
 	$_POST['p_entry_0'] || $_POST['p_entry_1'] 	|| $_POST['p_entry_2'] 	|| $_POST['p_entry_3'] 	|| $_POST['p_entry_4'] 	|| 
 	$_POST['p_entry_5'] || $_POST['p_entry_6'] 	|| $_POST['p_entry_7'] 	|| $_POST['p_entry_8'] 	|| $_POST['p_entry_9'] 	||
 	$_POST['p_meat_0'] 	|| $_POST['p_meat_1'] 	|| $_POST['p_meat_2'] 	|| $_POST['p_meat_3'] 	|| $_POST['p_meat_4'] 	||
 	$_POST['p_meat_5'] 	|| $_POST['p_meat_6'] 	|| $_POST['p_meat_7'] 	|| $_POST['p_meat_8'] 	|| $_POST['p_meat_9'] 	||
 	$_POST['p_fish_0'] 	|| $_POST['p_fish_1'] 	|| $_POST['p_fish_2'] 	|| $_POST['p_fish_3'] 	|| $_POST['p_fish_4'] 	|| 
 	$_POST['p_fish_5'] 	|| $_POST['p_fish_6'] 	|| $_POST['p_fish_7'] 	|| $_POST['p_fish_8'] 	|| $_POST['p_fish_9'] 	||
 	$_POST['p_other_0'] || $_POST['p_other_1'] 	|| $_POST['p_other_2'] 	|| $_POST['p_other_3'] 	|| $_POST['p_other_4'] 	||
 	$_POST['p_other_5'] || $_POST['p_other_6'] 	|| $_POST['p_other_7'] 	|| $_POST['p_other_8'] 	|| $_POST['p_other_9'] 	||
 	$_POST['p_desert_0']|| $_POST['p_desert_1']	|| $_POST['p_desert_2'] || $_POST['p_desert_3'] || $_POST['p_desert_4'] ||
 	$_POST['p_desert_5']|| $_POST['p_desert_6']	|| $_POST['p_desert_7'] || $_POST['p_desert_8'] || $_POST['p_desert_9'] ||
 	$_POST['p_drink_0'] || $_POST['p_drink_1'] 	|| $_POST['p_drink_2'] 	|| $_POST['p_drink_3'] 	|| $_POST['p_drink_4'] 	||
 	$_POST['p_drink_5'] || $_POST['p_drink_6'] 	|| $_POST['p_drink_7'] 	|| $_POST['p_drink_8'] 	|| $_POST['p_drink_9']) 
	{
		if (!empty($_POST['menu_0'])) {
	  		$menu_0 = $_POST['menu_0'];
		}
		if (!empty($_POST['menu_1'])) {
	  		$menu_1 = $_POST['menu_1'];
		}
		if (!empty($_POST['menu_2'])) {
	  		$menu_2 = $_POST['menu_2'];
		}
		if (!empty($_POST['menu_3'])) {
	  		$menu_3 = $_POST['menu_3'];
		}
		if (!empty($_POST['menu_4'])) {
	  		$menu_4 = $_POST['menu_4'];
		}
		if (!empty($_POST['menu_5'])) {
	  		$menu_5 = $_POST['menu_5'];
		}
		if (!empty($_POST['menu_6'])) {
	  		$menu_6 = $_POST['menu_6'];
		}
		if (!empty($_POST['menu_7'])) {
	  		$menu_7 = $_POST['menu_7'];
		}
		if (!empty($_POST['menu_8'])) {
	  		$menu_8 = $_POST['menu_8'];
		}
		if (!empty($_POST['menu_9'])) {
	  		$menu_9 = $_POST['menu_9'];
		}
		
		if (!empty($_POST['p_menu_0'])) {
	  		$p_menu_0 = $_POST['p_menu_0'];
		}
		if (!empty($_POST['p_menu_1'])) {
	  		$p_menu_1 = $_POST['p_menu_1'];
		}
		if (!empty($_POST['p_menu_2'])) {
	  		$p_menu_2 = $_POST['p_menu_2'];
		}
		if (!empty($_POST['p_menu_3'])) {
	  		$p_menu_3 = $_POST['p_menu_3'];
		}
		if (!empty($_POST['p_menu_4'])) {
	  		$p_menu_4 = $_POST['p_menu_4'];
		}
		if (!empty($_POST['p_menu_5'])) {
	  		$p_menu_5 = $_POST['p_menu_5'];
		}
		if (!empty($_POST['p_menu_6'])) {
	  		$p_menu_6 = $_POST['p_menu_6'];
		}
		if (!empty($_POST['p_menu_7'])) {
	  		$p_menu_7 = $_POST['p_menu_7'];
		}
		if (!empty($_POST['p_menu_8'])) {
	  		$p_menu_8 = $_POST['p_menu_8'];
		}
		if (!empty($_POST['p_menu_9'])) {
	  		$p_menu_9 = $_POST['p_menu_9'];
		}
		
		if (!empty($_POST['entry_0'])) {
	  		$entry_0 = $_POST['entry_0'];
		}
		if (!empty($_POST['entry_1'])) {
		  $entry_1 = $_POST['entry_1'];
		}
		if (!empty($_POST['entry_2'])) {
		  $entry_2 = $_POST['entry_2'];
		}
		if (!empty($_POST['entry_3'])) {
		  $entry_3 = $_POST['entry_3'];
		}
		if (!empty($_POST['entry_4'])) {
		  $entry_4 = $_POST['entry_4'];
		}
		if (!empty($_POST['entry_5'])) {
		  $entry_5 = $_POST['entry_5'];
		}
		if (!empty($_POST['entry_6'])) {
		  $entry_6 = $_POST['entry_6'];
		}
		if (!empty($_POST['entry_7'])) {
		  $entry_7 = $_POST['entry_7'];
		}
		if (!empty($_POST['entry_8'])) {
		  $entry_8 = $_POST['entry_8'];
		}
		if (!empty($_POST['entry_9'])) {
		  $entry_9 = $_POST['entry_9'];
		}
		
		if (!empty($_POST['p_entry_0'])) {
	  		$p_entry_0 = $_POST['p_entry_0'];
		}
		if (!empty($_POST['p_entry_1'])) {
	  		$p_entry_1 = $_POST['p_entry_1'];
		}
		if (!empty($_POST['p_entry_2'])) {
	  		$p_entry_2 = $_POST['p_entry_2'];
		}
		if (!empty($_POST['p_entry_3'])) {
	  		$p_entry_3 = $_POST['p_entry_3'];
		}
		if (!empty($_POST['p_entry_4'])) {
	  		$p_entry_4 = $_POST['p_entry_4'];
		}
		if (!empty($_POST['p_entry_5'])) {
	  		$p_entry_5 = $_POST['p_entry_5'];
		}
		if (!empty($_POST['p_entry_6'])) {
	  		$p_entry_6 = $_POST['p_entry_6'];
		}
		if (!empty($_POST['p_entry_7'])) {
	  		$p_entry_7 = $_POST['p_entry_7'];
		}
		if (!empty($_POST['p_entry_8'])) {
	  		$p_entry_8 = $_POST['p_entry_8'];
		}
		if (!empty($_POST['p_entry_9'])) {
	  		$p_entry_9 = $_POST['p_entry_9'];
		}
		if (!empty($_POST['p_entry_3'])) {
	  		$p_entry_3 = $_POST['p_entry_3'];
		}
		
		if (!empty($_POST['meat_0'])) {
		  $meat_0 = $_POST['meat_0'];
		}
		if (!empty($_POST['meat_1'])) {
		  $meat_1 = $_POST['meat_1'];
		}
		if (!empty($_POST['meat_2'])) {
		  $meat_2 = $_POST['meat_2'];
		}
		if (!empty($_POST['meat_3'])) {
		  $meat_3 = $_POST['meat_3'];
		}
		if (!empty($_POST['meat_4'])) {
		  $meat_4 = $_POST['meat_4'];
		}
		if (!empty($_POST['meat_5'])) {
		  $meat_5 = $_POST['meat_5'];
		}
		if (!empty($_POST['meat_6'])) {
		  $meat_6 = $_POST['meat_6'];
		}
		if (!empty($_POST['meat_7'])) {
		  $meat_7 = $_POST['meat_7'];
		}
		if (!empty($_POST['meat_8'])) {
		  $meat_8 = $_POST['meat_8'];
		}
		if (!empty($_POST['meat_9'])) {
		  $meat_9 = $_POST['meat_9'];
		}
		
		if (!empty($_POST['p_meat_0'])) {
		  $p_meat_0 = $_POST['p_meat_0'];
		}
		if (!empty($_POST['p_meat_1'])) {
		  $p_meat_1 = $_POST['p_meat_1'];
		}
		if (!empty($_POST['p_meat_2'])) {
		  $p_meat_2 = $_POST['p_meat_2'];
		}
		if (!empty($_POST['p_meat_3'])) {
		  $p_meat_3 = $_POST['p_meat_3'];
		}
		if (!empty($_POST['p_meat_4'])) {
		  $p_meat_4 = $_POST['p_meat_4'];
		}
		if (!empty($_POST['p_meat_5'])) {
		  $p_meat_5 = $_POST['p_meat_5'];
		}
		if (!empty($_POST['p_meat_6'])) {
		  $p_meat_6 = $_POST['p_meat_6'];
		}
		if (!empty($_POST['p_meat_7'])) {
		  $p_meat_7 = $_POST['p_meat_7'];
		}
		if (!empty($_POST['p_meat_8'])) {
		  $p_meat_8 = $_POST['p_meat_8'];
		}
		if (!empty($_POST['p_meat_9'])) {
		  $p_meat_9 = $_POST['p_meat_9'];
		}
			
		if (!empty($_POST['fish_0'])) {
		  $fish_0 = $_POST['fish_0'];
		}
		if (!empty($_POST['fish_1'])) {
		  $fish_1 = $_POST['fish_1'];
		}
		if (!empty($_POST['fish_2'])) {
		  $fish_2 = $_POST['fish_2'];
		}
		if (!empty($_POST['fish_3'])) {
		  $fish_3 = $_POST['fish_3'];
		}
		if (!empty($_POST['fish_4'])) {
		  $fish_4 = $_POST['fish_4'];
		}
		if (!empty($_POST['fish_5'])) {
		  $fish_5 = $_POST['fish_5'];
		}
		if (!empty($_POST['fish_6'])) {
		  $fish_6 = $_POST['fish_6'];
		}
		if (!empty($_POST['fish_7'])) {
		  $fish_7 = $_POST['fish_7'];
		}
		if (!empty($_POST['fish_8'])) {
		  $fish_8 = $_POST['fish_8'];
		}
		if (!empty($_POST['fish_9'])) {
		  $fish_9 = $_POST['fish_9'];
		}
			
		if (!empty($_POST['p_fish_0'])) {
		  $p_fish_0 = $_POST['p_fish_0'];
		}
		if (!empty($_POST['p_fish_1'])) {
		  $p_fish_1 = $_POST['p_fish_1'];
		}
		if (!empty($_POST['p_fish_2'])) {
		  $p_fish_2 = $_POST['p_fish_2'];
		}
		if (!empty($_POST['p_fish_3'])) {
		  $p_fish_3 = $_POST['p_fish_3'];
		}
		if (!empty($_POST['p_fish_4'])) {
		  $p_fish_4 = $_POST['p_fish_4'];
		}
		if (!empty($_POST['p_fish_5'])) {
		  $p_fish_5 = $_POST['p_fish_5'];
		}
		if (!empty($_POST['p_fish_6'])) {
		  $p_fish_6 = $_POST['p_fish_6'];
		}
		if (!empty($_POST['p_fish_7'])) {
		  $p_fish_7 = $_POST['p_fish_7'];
		}
		if (!empty($_POST['p_fish_8'])) {
		  $p_fish_8 = $_POST['fp_ish_8'];
		}
		if (!empty($_POST['p_fish_9'])) {
		  $p_fish_9 = $_POST['p_fish_9'];
		}
			
			
		if (!empty($_POST['other_0'])) {
		  $other_0 = $_POST['other_0'];
		}
		if (!empty($_POST['other_1'])) {
		  $other_1 = $_POST['other_1'];
		}
		if (!empty($_POST['other_2'])) {
		  $other_2 = $_POST['other_2'];
		}
		if (!empty($_POST['other_3'])) {
		  $other_3 = $_POST['other_3'];
		}
		if (!empty($_POST['other_4'])) {
		  $other_4 = $_POST['other_4'];
		}
		if (!empty($_POST['other_5'])) {
		  $other_5 = $_POST['other_5'];
		}
		if (!empty($_POST['other_6'])) {
		  $other_6 = $_POST['other_6'];
		}
		if (!empty($_POST['other_7'])) {
		  $other_7 = $_POST['other_7'];
		}
		if (!empty($_POST['other_8'])) {
		  $other_8 = $_POST['other_8'];
		}
		if (!empty($_POST['other_9'])) {
		  $other_9 = $_POST['other_9'];
		}
			
		if (!empty($_POST['p_other_0'])) {
		  $p_other_0 = $_POST['p_other_0'];
		}
		if (!empty($_POST['p_other_1'])) {
		  $p_other_1 = $_POST['p_other_1'];
		}
		if (!empty($_POST['p_other_2'])) {
		  $p_other_2 = $_POST['p_other_2'];
		}
		if (!empty($_POST['p_other_3'])) {
		  $p_other_3 = $_POST['p_other_3'];
		}
		if (!empty($_POST['p_other_4'])) {
		  $p_other_4 = $_POST['p_other_4'];
		}
		if (!empty($_POST['p_other_5'])) {
		  $p_other_5 = $_POST['p_other_5'];
		}
		if (!empty($_POST['p_other_6'])) {
		  $p_other_6 = $_POST['p_other_6'];
		}
		if (!empty($_POST['p_other_7'])) {
		  $p_other_7 = $_POST['p_other_7'];
		}
		if (!empty($_POST['p_other_8'])) {
		  $p_other_8 = $_POST['p_other_8'];
		}
		if (!empty($_POST['p_other_9'])) {
		  $p_other_9 = $_POST['p_other_9'];
		}
			
			
		if (!empty($_POST['desert_0'])) {
		  $desert_0 = $_POST['desert_0'];
		}
		if (!empty($_POST['desert_1'])) {
		  $desert_1 = $_POST['desert_1'];
		}
		if (!empty($_POST['desert_2'])) {
		  $desert_2 = $_POST['desert_2'];
		}
		if (!empty($_POST['desert_3'])) {
		  $desert_3 = $_POST['desert_3'];
		}
		if (!empty($_POST['desert_4'])) {
		  $desert_4 = $_POST['desert_4'];
		}
		if (!empty($_POST['desert_5'])) {
		  $desert_5 = $_POST['desert_5'];
		}
		if (!empty($_POST['desert_6'])) {
		  $desert_6 = $_POST['desert_6'];
		}
		if (!empty($_POST['desert_7'])) {
		  $desert_7 = $_POST['desert_7'];
		}
		if (!empty($_POST['desert_8'])) {
		  $desert_8 = $_POST['desert_8'];
		}
		if (!empty($_POST['desert_9'])) {
		  $desert_9 = $_POST['desert_9'];
		}
			
			
		if (!empty($_POST['p_desert_0'])) {
		  $p_desert_0 = $_POST['p_desert_0'];
		}
		if (!empty($_POST['p_desert_1'])) {
		  $p_desert_1 = $_POST['p_desert_1'];
		}
		if (!empty($_POST['desert_2'])) {
		  $p_desert_2 = $_POST['desert_2'];
		}
		if (!empty($_POST['p_desert_3'])) {
		  $p_desert_3 = $_POST['p_desert_3'];
		}
		if (!empty($_POST['p_desert_4'])) {
		  $p_desert_4 = $_POST['p_desert_4'];
		}
		if (!empty($_POST['p_desert_5'])) {
		  $p_desert_5 = $_POST['p_desert_5'];
		}
		if (!empty($_POST['p_desert_6'])) {
		  $p_desert_6 = $_POST['p_desert_6'];
		}
		if (!empty($_POST['p_desert_7'])) {
		  $p_desert_7 = $_POST['p_desert_7'];
		}
		if (!empty($_POST['p_desert_8'])) {
		  $p_desert_8 = $_POST['p_desert_8'];
		}
		if (!empty($_POST['p_desert_9'])) {
		  $p_desert_9 = $_POST['p_desert_9'];
		}
		
		if (!empty($_POST['drink_0'])) {
		  $drink_0 = $_POST['drink_0'];
		}
		if (!empty($_POST['drink_1'])) {
		  $drink_1 = $_POST['drink_1'];
		}
		if (!empty($_POST['drink_2'])) {
		  $drink_2 = $_POST['drink_2'];
		}
		if (!empty($_POST['drink_3'])) {
		  $drink_3 = $_POST['drink_3'];
		}
		if (!empty($_POST['drink_4'])) {
		  $drink_4 = $_POST['drink_4'];
		}
		if (!empty($_POST['drink_5'])) {
		  $drink_5 = $_POST['drink_5'];
		}
		if (!empty($_POST['drink_6'])) {
		  $drink_6 = $_POST['drink_6'];
		}
		if (!empty($_POST['drink_7'])) {
		  $drink_7 = $_POST['drink_7'];
		}
		if (!empty($_POST['drink_8'])) {
		  $drink_8 = $_POST['drink_8'];
		}
		if (!empty($_POST['drink_9'])) {
		  $drink_9 = $_POST['drink_9'];
		}
		
		if (!empty($_POST['p_drink_0'])) {
		  $p_drink_0 = $_POST['p_drink_0'];
		}
		if (!empty($_POST['p_drink_1'])) {
		  $p_drink_1 = $_POST['p_drink_1'];
		}
		if (!empty($_POST['p_drink_2'])) {
		  $p_drink_2 = $_POST['p_drink_2'];
		}
		if (!empty($_POST['p_drink_3'])) {
		  $p_drink_3 = $_POST['p_drink_3'];
		}
		if (!empty($_POST['p_drink_4'])) {
		  $p_drink_4 = $_POST['p_drink_4'];
		}
		if (!empty($_POST['p_drink_5'])) {
		  $p_drink_5 = $_POST['p_drink_5'];
		}
		if (!empty($_POST['p_drink_6'])) {
		  $p_drink_6 = $_POST['p_drink_6'];
		}
		if (!empty($_POST['p_drink_7'])) {
		  $p_drink_7 = $_POST['p_drink_7'];
		}
		if (!empty($_POST['p_drink_8'])) {
		  $p_drink_8 = $_POST['p_drink_8'];
		}
		if (!empty($_POST['p_drink_9'])) {
		  $p_drink_9 = $_POST['p_drink_9'];
		}
		
	   $sql = mysql_query("UPDATE members SET 
	   menu_0='$menu_0', 		menu_1='$menu_1', 		menu_2='$menu_2', 		menu_3='$menu_3',		menu_4='$menu_4', 	 
	   menu_5='$menu_5', 		menu_6='$menu_6', 		menu_7='$menu_7', 		menu_8='$menu_8', 		menu_9='$menu_9', 
	   entry_0='$entry_0', 		entry_1='$entry_1', 	entry_2='$entry_2', 	entry_3='$entry_3',		entry_4='$entry_4', 	 
	   entry_5='$entry_5', 		entry_6='$entry_6', 	entry_7='$entry_7', 	entry_8='$entry_8', 	entry_9='$entry_9',  
	   meat_0='$meat_0', 		meat_1='$meat_1', 		meat_2='$meat_2', 		meat_3='$meat_3', 		meat_4='$meat_4', 
	   meat_5='$meat_5', 		meat_6='$meat_6', 		meat_7='$meat_7', 		meat_8='$meat_8', 		meat_9='$meat_9', 
	   fish_0='$fish_0', 		fish_1='$fish_1', 		fish_2='$fish_2', 		fish_3='$fish_3', 		fish_4='$fish_4', 
	   fish_5='$fish_5', 		fish_6='$fish_6', 		fish_7='$fish_7', 		fish_8='$fish_8', 		fish_9='$fish_9', 
	   other_0='$other_0',		other_1='$other_1', 	other_2='$other_2', 	other_3='$other_3',		other_4='$other_4', 
	   other_5='$other_5', 		other_6='$other_6', 	other_7='$other_7', 	other_8='$other_8', 	other_9='$other_9', 
	   desert_0='$desert_0', 	desert_1='$desert_1', 	desert_2='$desert_2', 	desert_3='$desert_3', 	desert_4='$desert_4',
	   desert_5='$desert_5', 	desert_6='$desert_6', 	desert_7='$desert_7', 	desert_8='$desert_8', 	desert_9='$desert_9', 
	   drink_0='$drink_0', 		drink_1='$drink_1', 	drink_2='$drink_2', 	drink_3='$drink_3', 	drink_4='$drink_4',
	   drink_5='$drink_5', 		drink_6='$drink_6', 	drink_7='$drink_7', 	drink_8='$drink_8', 	drink_9='$drink_9',
	   p_menu_0='$p_menu_0', 	p_menu_1='$p_menu_1',	p_menu_2='$p_menu_2', 	p_menu_3='$p_menu_3',	p_menu_4='$p_menu_4', 	 
	   p_menu_5='$p_menu_5', 	p_menu_6='$p_menu_6',	p_menu_7='$p_menu_7', 	p_menu_8='$p_menu_8', 	p_menu_9='$p_menu_9', 
	   p_entry_0='$p_entry_0', 	p_entry_1='$p_entry_1',	p_entry_2='$p_entry_2',	p_entry_3='$p_entry_3',	p_entry_4='$p_entry_4', 	 
	   p_entry_5='$p_entry_5', 	p_entry_6='$p_entry_6',	p_entry_7='$p_entry_7',	p_entry_8='$p_entry_8',	p_entry_9='$p_entry_9',
	   p_meat_0='$p_meat_0', 	p_meat_1='$p_meat_1', 	p_meat_2='$p_meat_2', 	p_meat_3='$p_meat_3', 	p_meat_4='$p_meat_4', 
	   p_meat_5='$p_meat_5', 	p_meat_6='$p_meat_6', 	p_meat_7='$p_meat_7', 	p_meat_8='$p_meat_8', 	p_meat_9='$p_meat_9',
	   p_fish_0='$p_fish_0', 	p_fish_1='$p_fish_1',	p_fish_2='$p_fish_2', 	p_fish_3='$p_fish_3', 	p_fish_4='$p_fish_4', 
	   p_fish_5='$p_fish_5', 	p_fish_6='$p_fish_6',	p_fish_7='$p_fish_7', 	p_fish_8='$p_fish_8', 	p_fish_9='$p_fish_9',
	   p_other_0='$p_other_0',	p_other_1='$p_other_1', p_other_2='$p_other_2', p_other_3='$p_other_3',	p_other_4='$p_other_4', 
	   p_other_5='$p_other_5', 	p_other_6='$p_other_6', p_other_7='$p_other_7', p_other_8='$p_other_8', p_other_9='$p_other_9', 
	   p_desert_0='$p_desert_0',p_desert_1='$p_desert_1',p_desert_2='$p_desert_2',p_desert_3='$p_desert_3',p_desert_4='$p_desert_4',
	   p_desert_5='$p_desert_5',p_desert_6='$p_desert_6',p_desert_7='$p_desert_7',p_desert_8='$p_desert_8',p_desert_9='$p_desert_9',
	   p_drink_0='$p_drink_0', 	p_drink_1='$p_drink_1', p_drink_2='$p_drink_2', p_drink_3='$drink_3', 	p_drink_4='$p_drink_4',
	   p_drink_5='$p_drink_5', 	p_drink_6='$p_drink_6', p_drink_7='$p_drink_7', p_drink_8='$drink_8', 	p_drink_9='$p_drink_9'  
	   						WHERE id='$id'"); 
		 
	header('Location: member_menus.php?id=' . $id . '');
	#  echo 'Os pratos foram adicionados/actualizados com sucesso! Dados agora disponiveis para consulta.<br /><br />
	#	Para voltar para o seu perfil, <a href="member_profile.php?id=' . $id . '">clique aqui</a>';
	exit();
	} // close if post

// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM members WHERE id='$id' LIMIT 1");
while($row = mysql_fetch_array($sql))
{
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
}
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/buttons.css" type="text/css">
		<link rel="stylesheet" href="css/titles.css" type="text/css">

		<title>Editar Informações de Conta</title>
		
		<script type="text/javascript">
			function validate_form() 
			{ 
				valid = true; 
				if (
				document.form.menu_0.value == "" && document.form.menu_1.value == "" && document.form.menu_2.value == "" &&
				document.form.menu_3.value == "" && document.form.menu_4.value == "" && document.form.menu_5.value == "" &&
				document.form.menu_6.value == "" && document.form.menu_7.value == "" && document.form.menu_8.value == "" &&
				document.form.menu_9.value == "" && 
				document.form.entry_0.value == "" && document.form.entry_1.value == "" && document.form.entry_2.value == "" &&
				document.form.entry_3.value == "" && document.form.entry_4.value == "" && document.form.entry_5.value == "" &&
				document.form.entry_6.value == "" && document.form.entry_7.value == "" && document.form.entry_8.value == "" &&
				document.form.entry_9.value == "" && 
				document.form.meat_0.value == "" && document.form.meat_1.value == "" && document.form.meat_2.value == "" &&
				document.form.meat_3.value == "" && document.form.meat_4.value == "" && document.form.meat_5.value == "" &&
				document.form.meat_6.value == "" && document.form.meat_7.value == "" && document.form.meat_8.value == "" &&
				document.form.meat_9.value == "" && 
				document.form.fish_0.value == "" && document.form.fish_1.value == "" && document.form.fish_2.value == "" &&
				document.form.fish_3.value == "" && document.form.fish_4.value == "" && document.form.fish_5.value == "" &&
				document.form.fish_6.value == "" && document.form.fish_7.value == "" && document.form.fish_8.value == "" &&
				document.form.fish_9.value == "" &&
				document.form.other_0.value == "" && document.form.other_1.value == "" && document.form.other_2.value == "" &&
				document.form.other_3.value == "" && document.form.other_4.value == "" && document.form.other_5.value == "" &&
				document.form.other_6.value == "" && document.form.other_7.value == "" && document.form.other_8.value == "" &&
				document.form.other_9.value == "" &&
				document.form.desert_0.value == "" && document.form.desert_1.value == "" && document.form.desert_2.value == "" &&
				document.form.desert_3.value == "" && document.form.desert_4.value == "" && document.form.desert_5.value == "" &&
				document.form.desert_6.value == "" && document.form.desert_7.value == "" && document.form.desert_8.value == "" &&
				document.form.desert_9.value == "" &&
				document.form.drink_0.value == "" && document.form.drink_1.value == "" && document.form.drink_2.value == "" &&
				document.form.drink_3.value == "" && document.form.drink_4.value == "" && document.form.drink_5.value == "" &&
				document.form.drink_6.value == "" && document.form.drink_7.value == "" && document.form.drink_8.value == "" &&
				document.form.drink_9.value == "" )
				{ 
					alert ( "Tem de adicionar pelo menos um prato." ); 
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

	
			<div id="new_div" style="width: 100%; display: table;">
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
						    		<div id="title_profile" style="display: inline-block;">Adicione ou edite os seus pratos aqui</div><br /><br />
							</div>
					  
					   
					   	<div style="padding-left:100px;">
					   		<form action="edit_plates.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
					   			
								<div id="Menus"></div>
						 		<br /><br /><div id="plate_title">Menus:</div><br />
						 			
						 			
						 		<input name="menu_0" type="text" id="plate_input" value="<?php echo "$menu_0"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_0" type="text" id="plate_price" value="<?php echo "$p_menu_0"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="menu_1" type="text" id="plate_input" value="<?php echo "$menu_1"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_1" type="text" id="plate_price" value="<?php echo "$p_menu_1"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_2" type="text" id="plate_input" value="<?php echo "$menu_2"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_2" type="text" id="plate_price" value="<?php echo "$p_menu_2"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_3" type="text" id="plate_input" value="<?php echo "$menu_3"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_3" type="text" id="plate_price" value="<?php echo "$p_menu_3"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_4" type="text" id="plate_input" value="<?php echo "$menu_4"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_4" type="text" id="plate_price" value="<?php echo "$p_menu_4"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_5" type="text" id="plate_input" value="<?php echo "$menu_5"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_5" type="text" id="plate_price" value="<?php echo "$p_menu_5"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_6" type="text" id="plate_input" value="<?php echo "$menu_6"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_6" type="text" id="plate_price" value="<?php echo "$p_menu_6"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_7" type="text" id="plate_input" value="<?php echo "$menu_7"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_7" type="text" id="plate_price" value="<?php echo "$p_menu_7"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_8" type="text" id="plate_input" value="<?php echo "$menu_8"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_8" type="text" id="plate_price" value="<?php echo "$p_menu_8"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="menu_9" type="text" id="plate_input" value="<?php echo "$menu_9"; ?>" size="30" maxlength="255" />
							   	<input name="p_menu_9" type="text" id="plate_price" value="<?php echo "$p_menu_9"; ?>" size="30" maxlength="255" />€<br /><br />

							    <tr>
									 	<td>&nbsp;</td>
		    					 	<div id="wrapper" style="text-align: center">  
							     		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							    </tr>
							    
								<div id="Entradas"></div>
							    <br /><br /><div id="plate_title">Entradas:</div><br />
							    <input name="entry_0" type="text" id="plate_input" value="<?php echo "$entry_0"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_0" type="text" id="plate_price" value="<?php echo "$p_entry_0"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="entry_1" type="text" id="plate_input" value="<?php echo "$entry_1"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_1" type="text" id="plate_price" value="<?php echo "$p_entry_1"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_2" type="text" id="plate_input" value="<?php echo "$entry_2"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_2" type="text" id="plate_price" value="<?php echo "$p_entry_2"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_3" type="text" id="plate_input" value="<?php echo "$entry_3"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_3" type="text" id="plate_price" value="<?php echo "$p_entry_3"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_4" type="text" id="plate_input" value="<?php echo "$entry_4"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_4" type="text" id="plate_price" value="<?php echo "$p_entry_4"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_5" type="text" id="plate_input" value="<?php echo "$entry_5"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_5" type="text" id="plate_price" value="<?php echo "$p_entry_5"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_6" type="text" id="plate_input" value="<?php echo "$entry_6"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_6" type="text" id="plate_price" value="<?php echo "$p_entry_6"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_7" type="text" id="plate_input" value="<?php echo "$entry_7"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_7" type="text" id="plate_price" value="<?php echo "$p_entry_7"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_8" type="text" id="plate_input" value="<?php echo "$entry_8"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_8" type="text" id="plate_price" value="<?php echo "$p_entry_8"; ?>" size="30" maxlength="255" />€<br /><br />
							    <input name="entry_9" type="text" id="plate_input" value="<?php echo "$entry_9"; ?>" size="30" maxlength="255" />
							    <input name="p_entry_9" type="text" id="plate_price" value="<?php echo "$p_entry_9"; ?>" size="30" maxlength="255" />€<br /><br />

							    <tr>
									 	<td>&nbsp;</td>
		    					 	<div id="wrapper" style="text-align: center">  
							     		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							    </tr>
							    
								<div id="Carne"></div>
							    <br /><br /><div id="plate_title">Pratos de Carne:</div><br />
							    <input name="meat_0" type="text" id="plate_input" value="<?php echo "$meat_0"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_0" type="text" id="plate_price" value="<?php echo "$p_meat_0"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_1" type="text" id="plate_input" value="<?php echo "$meat_1"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_1" type="text" id="plate_price" value="<?php echo "$p_meat_1"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_2" type="text" id="plate_input" value="<?php echo "$meat_2"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_2" type="text" id="plate_price" value="<?php echo "$p_meat_2"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_3" type="text" id="plate_input" value="<?php echo "$meat_3"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_3" type="text" id="plate_price" value="<?php echo "$p_meat_3"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_4" type="text" id="plate_input" value="<?php echo "$meat_4"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_4" type="text" id="plate_price" value="<?php echo "$p_meat_4"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_5" type="text" id="plate_input" value="<?php echo "$meat_5"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_5" type="text" id="plate_price" value="<?php echo "$p_meat_5"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_6" type="text" id="plate_input" value="<?php echo "$meat_6"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_6" type="text" id="plate_price" value="<?php echo "$p_meat_6"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_7" type="text" id="plate_input" value="<?php echo "$meat_7"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_7" type="text" id="plate_price" value="<?php echo "$p_meat_7"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_8" type="text" id="plate_input" value="<?php echo "$meat_8"; ?>" size="30" maxlength="255" />
							    <input name="p_meat_8" type="text" id="plate_price" value="<?php echo "$p_meat_8"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="meat_9" type="text" id="plate_input" value="<?php echo "$meat_9"; ?>" size="30" maxlength="255" />
								<input name="p_meat_9" type="text" id="plate_price" value="<?php echo "$p_meat_9"; ?>" size="30" maxlength="255" />€<br /><br />
							   	
							    <tr>
									 	<td>&nbsp;</td>
		    					 	<div id="wrapper" style="text-align: center">  
							     		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							    </tr>
							    
								<div id="Peixe"></div>
							    <br /><br /><div id="plate_title">Pratos de Peixe:</div><br />
							    <input name="fish_0" type="text" id="plate_input" value="<?php echo "$fish_0"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_0" type="text" id="plate_price" value="<?php echo "$p_fish_0"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_1" type="text" id="plate_input" value="<?php echo "$fish_1"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_1" type="text" id="plate_price" value="<?php echo "$p_fish_1"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_2" type="text" id="plate_input" value="<?php echo "$fish_2"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_2" type="text" id="plate_price" value="<?php echo "$p_fish_2"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_3" type="text" id="plate_input" value="<?php echo "$fish_3"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_3" type="text" id="plate_price" value="<?php echo "$p_fish_3"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_4" type="text" id="plate_input" value="<?php echo "$fish_4"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_4" type="text" id="plate_price" value="<?php echo "$p_fish_4"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_5" type="text" id="plate_input" value="<?php echo "$fish_5"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_5" type="text" id="plate_price" value="<?php echo "$p_fish_5"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_6" type="text" id="plate_input" value="<?php echo "$fish_6"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_6" type="text" id="plate_price" value="<?php echo "$p_fish_6"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_7" type="text" id="plate_input" value="<?php echo "$fish_7"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_7" type="text" id="plate_price" value="<?php echo "$p_fish_7"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_8" type="text" id="plate_input" value="<?php echo "$fish_8"; ?>" size="30" maxlength="255" />
							    <input name="p_fish_8" type="text" id="plate_price" value="<?php echo "$p_fish_8"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="fish_9" type="text" id="plate_input" value="<?php echo "$fish_9"; ?>" size="30" maxlength="255" />
								<input name="p_fish_9" type="text" id="plate_price" value="<?php echo "$p_fish_9"; ?>" size="30" maxlength="255" />€<br /><br />
							   	
							    <tr>
									 	<td>&nbsp;</td>
		    					 	<div id="wrapper" style="text-align: center">  
							     		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							    </tr>
							    
								<div id="Outros"></div>
							    <br /><br /><div id="plate_title"><b>Outros Pratos:</b></div><br />
							    <input name="other_0" type="text" id="plate_input" value="<?php echo "$other_0"; ?>" size="30" maxlength="255" />
							    <input name="p_other_0" type="text" id="plate_price" value="<?php echo "$p_other_0"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_1" type="text" id="plate_input" value="<?php echo "$other_1"; ?>" size="30" maxlength="255" />
							    <input name="p_other_1" type="text" id="plate_price" value="<?php echo "$p_other_1"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_2" type="text" id="plate_input" value="<?php echo "$other_2"; ?>" size="30" maxlength="255" />
							    <input name="p_other_2" type="text" id="plate_price" value="<?php echo "$p_other_2"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_3" type="text" id="plate_input" value="<?php echo "$other_3"; ?>" size="30" maxlength="255" />
							    <input name="p_other_3" type="text" id="plate_price" value="<?php echo "$p_other_3"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_4" type="text" id="plate_input" value="<?php echo "$other_4"; ?>" size="30" maxlength="255" />
							    <input name="p_other_4" type="text" id="plate_price" value="<?php echo "$p_other_4"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_5" type="text" id="plate_input" value="<?php echo "$other_5"; ?>" size="30" maxlength="255" />
							    <input name="p_other_5" type="text" id="plate_price" value="<?php echo "$p_other_5"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_6" type="text" id="plate_input" value="<?php echo "$other_6"; ?>" size="30" maxlength="255" />
							    <input name="p_other_6" type="text" id="plate_price" value="<?php echo "$p_other_6"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_7" type="text" id="plate_input" value="<?php echo "$other_7"; ?>" size="30" maxlength="255" />
							    <input name="p_other_7" type="text" id="plate_price" value="<?php echo "$p_other_7"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_8" type="text" id="plate_input" value="<?php echo "$other_8"; ?>" size="30" maxlength="255" />
							    <input name="p_other_8" type="text" id="plate_price" value="<?php echo "$p_other_8"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="other_9" type="text" id="plate_input" value="<?php echo "$other_9"; ?>" size="30" maxlength="255" />
								<input name="p_other_9" type="text" id="plate_price" value="<?php echo "$p_other_9"; ?>" size="30" maxlength="255" />€<br /><br />
							   	
							    <tr>
									 	<td>&nbsp;</td>
		    					 	<div id="wrapper" style="text-align: center">  
							     		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							    </tr>
							     
								<div id="Sobremesas"></div>
							    <br /><br /><div id="plate_title"><b>Sobremesas:</b></div><br />
							    <input name="desert_0" type="text" id="plate_input" value="<?php echo "$desert_0"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_0" type="text" id="plate_price" value="<?php echo "$p_desert_0"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_1" type="text" id="plate_input" value="<?php echo "$desert_1"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_1" type="text" id="plate_price" value="<?php echo "$p_desert_1"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_2" type="text" id="plate_input" value="<?php echo "$desert_2"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_2" type="text" id="plate_price" value="<?php echo "$p_desert_2"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_3" type="text" id="plate_input" value="<?php echo "$desert_3"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_3" type="text" id="plate_price" value="<?php echo "$p_desert_3"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_4" type="text" id="plate_input" value="<?php echo "$desert_4"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_4" type="text" id="plate_price" value="<?php echo "$p_desert_4"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_5" type="text" id="plate_input" value="<?php echo "$desert_5"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_5" type="text" id="plate_price" value="<?php echo "$p_desert_5"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_6" type="text" id="plate_input" value="<?php echo "$desert_6"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_6" type="text" id="plate_price" value="<?php echo "$p_desert_6"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_7" type="text" id="plate_input" value="<?php echo "$desert_7"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_7" type="text" id="plate_price" value="<?php echo "$p_desert_7"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_8" type="text" id="plate_input" value="<?php echo "$desert_8"; ?>" size="30" maxlength="255" />
							    <input name="p_desert_8" type="text" id="plate_price" value="<?php echo "$p_desert_8"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="desert_9" type="text" id="plate_input" value="<?php echo "$desert_9"; ?>" size="30" maxlength="255" />
								<input name="p_desert_9" type="text" id="plate_price" value="<?php echo "$p_desert_9"; ?>" size="30" maxlength="255" />€<br /><br />
							   	
							    <tr>
									 	<td>&nbsp;</td>
		    					 	<div id="wrapper" style="text-align: center">  
							     		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							    </tr>
							    
							    <div id="Bebidas"></div>
							    <br /><br /><div id="plate_title"><b>Bebidas:</b></div><br />
							    <input name="drink_0" type="text" id="plate_input" value="<?php echo "$drink_0"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_0" type="text" id="plate_price" value="<?php echo "$p_drink_0"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_1" type="text" id="plate_input" value="<?php echo "$drink_1"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_1" type="text" id="plate_price" value="<?php echo "$p_drink_1"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_2" type="text" id="plate_input" value="<?php echo "$drink_2"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_2" type="text" id="plate_price" value="<?php echo "$p_drink_2"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_3" type="text" id="plate_input" value="<?php echo "$drink_3"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_3" type="text" id="plate_price" value="<?php echo "$p_drink_3"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_4" type="text" id="plate_input" value="<?php echo "$drink_4"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_4" type="text" id="plate_price" value="<?php echo "$p_drink_4"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_5" type="text" id="plate_input" value="<?php echo "$drink_5"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_5" type="text" id="plate_price" value="<?php echo "$p_drink_5"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_6" type="text" id="plate_input" value="<?php echo "$drink_6"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_6" type="text" id="plate_price" value="<?php echo "$p_drink_6"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_7" type="text" id="plate_input" value="<?php echo "$drink_7"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_7" type="text" id="plate_price" value="<?php echo "$p_drink_7"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_8" type="text" id="plate_input" value="<?php echo "$drink_8"; ?>" size="30" maxlength="255" />
							    <input name="p_drink_8" type="text" id="plate_price" value="<?php echo "$p_drink_8"; ?>" size="30" maxlength="255" />€<br /><br />
							   	<input name="drink_9" type="text" id="plate_input" value="<?php echo "$drink_9"; ?>" size="30" maxlength="255" />
								<input name="p_drink_9" type="text" id="plate_price" value="<?php echo "$p_drink_9"; ?>" size="30" maxlength="255" />€<br /><br />
							   	
							    <tr>
									 	<td>&nbsp;</td>
		    					 	<div id="wrapper" style="text-align: center">  
							     		<td><input style="display: inline-block;" class="button" type="submit" onclick="validate_form()" value="Submeter"/><br /><br /><br /></td>
										</div>
							    </tr>
							     <br /><br /><br /><div style="float: right"><b>Data de registo: </b><?php echo "$signupdate"; ?></div><br /><br /><br />
							 
					   		</form>
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


