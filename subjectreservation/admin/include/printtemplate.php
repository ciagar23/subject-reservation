<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$i=0;

$session = $_SESSION["username"];

$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];
		$position= $show['user_position'];


  ?>
          <?php require_once $content;?>  
      
     
		
</body>
</html>