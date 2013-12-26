<?php
session_start();
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
session_destroy(); 
$msg = "Saiu com sucesso";
?> 
<html>
<body>
<?php echo "$msg"; ?><br>
<p><a href="http://www.emenu-box.com">Clique aqui</a> para voltar ao inicio</p>
</body>
</html>