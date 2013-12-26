<?php

include_once "connect_to_mysql.php";
// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM members WHERE id='0' LIMIT 1");


while($row = mysql_fetch_array($sql)){
	$sensor = $row["sensor"];
}

$sensor_tag = '<div>"Temperatura: ' . $sensor . '"</div>'; 


?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
			
		<title>HM Meteo Station</title>
		<link rel="stylesheet" href="css/mainB.css" type="text/css">
		<link href="lightbox/css/lightbox.css" rel="stylesheet" />
		<script src="lightbox/js/jquery-1.10.2.min.js"></script>
		<script src="lightbox/js/lightbox-2.6.min.js"></script>
		
	</head>

		
	<body>
		<div id="big_wrapper">
			<header id="top_header">
				<hgroup id="top_group" >
					<div id="divh1"><a href="index.html">Luis Filipe Dias</a></div>
					<div id="divh2"><a href="http://www.ua.pt/deti/PageCourse.aspx?id=27&b=1&lg=en">Homemade Meteorological Station</a></div>
				</hgroup>
					<div id="imgwrapper">
						<img src="img/sun.png"/>
					</div>
			</header>

	
			<div id="new_div"  style="width: 100%; display: table;">
				<div id="main_section" style="display: table-row">
					 
					<div id="left_section">
			
						<nav id="top_menu">
	    						
						</nav>

						<div ><?php echo $sensor_tag; ?></div>

						
		</div>
					<div id="right_section" >	
						<div id="side_section" >
						</div>
					</div>
				</div>

			
			</div>
			
			<footer id="the_footer">
				This website is part of an experiment with HTML5.<br>
				Any problems detected are welcomed @ luisfiliperdias@gmail.com<br><br>
				<strong> Copyright &copy; 2013 luisfrdias.com. All rights reserved.</strong>
			</footer>
		</div>					
	</body>


</html>