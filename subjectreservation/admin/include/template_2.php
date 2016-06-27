<?php
if (!defined('WEB_ROOT')) {
	exit;
}


		

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$successMessage = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';

if ($errorMessage == '')
{
$errorMessage = '';
}
else
{
$errorMessage = '
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left"><font color=red>'.$errorMessage.'</font></td>
					
				</tr>
				</table>
				</div>

';
}


if ($successMessage == '')
{
$successMessage = '';
}
else
{
$successMessage = '<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><font color=green>'.$successMessage.'</font></td>
					
				</tr>
				</table>
				</div>';
}


$session = $_SESSION["username"];

$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];
		$position= $show['user_position'];


$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}


$self = WEB_ROOT . 'admin/index.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Reservation</title>

<!-- CSS -->
<link href="<?php echo WEB_ROOT;?>admin/include/style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo WEB_ROOT;?>admin/include/style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="<?php echo WEB_ROOT;?>admin/include/style/css/ie7.css" /><![endif]-->
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>


<script>

	$(document).ready(function(){		
		$(".addProject").colorbox({width:"440px", inline:true, href:"#add-new-project"});
		$(".addMilestone").colorbox({width:"440px", inline:true, href:"#add-new-milestone"});		
		
	});
</script>
<!-- JavaScripts-->
<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/style/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/style/js/jNice.js"></script>
</head>

<body>

	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>Subject Reservation</span></a></h1>
        Welcome <b><?php echo $fname; ?> <?php echo $lname; ?> 
                (<?php echo $position; ?>)</b>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
        	<li><a href="<?php echo WEB_ROOT;?>admin/">HOME</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="#">ABOUT US</a></li>
        	<li><a href="#">HELP</a></li>
        	<li class="logout"><a href="<?php echo $self; ?>?logout">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    
                    
                    
                    	<li><a href="#">MENU</a></li>
                    <? if($position=='STUDENT') {?>
                    	<li><a href="#">Subject Reservation</a></li>
                    	<li><a href="#">Reserved Subjects</a></li>
                    	<li><a href="#">Semistral Report</a></li>
						<li><a href="#">Payment</a></li>
                        
                        
                    
                    <? } else if($position=='FACULTY') {?>    
                    	<li><a href="#">Grade Submission</a></li>
                        
                    <? }else if ($position=='AREA HEAD') {?>  
                    	<li><a href="#">Subject Evaluation</a></li> 
                    <? }else if($position=='ADMIN') {?> 
                    	<li><a href="<?php echo WEB_ROOT;?>admin/category">Encode Subjects</a></li>
                    	<li><a href="<?php echo WEB_ROOT;?>admin/user">User</a></li>
                    	<li><a href="">Untagging</a></li>
                        <? }
						else {}?>
                    
                    
                    
                    
                    
                    
                    
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                 <h2><a href="#" class="active">CSA-B Online Subject Registration System</a></h2>
                
                <div id="main">
                <?php echo $errorMessage;?>
                <?php echo $successMessage;?>
              <?php require_once $content;?>
              <BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
              <BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
              <BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
                </div><!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <p id="footer">footer na d</p>
    </div>
    <!-- // #wrapper -->
</body>
</html>


