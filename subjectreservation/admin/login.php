<?php
require_once '../library/config.php';
require_once './library/functions.php';

$errorMessage = '';

if (isset($_POST['txtUserName'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>
<!doctype html><head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

	<!-- CSS -->
	
	<link href="<?php echo WEB_ROOT;?>admin/include/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="page-out">
<div class="page-in">
<div class="page">
<div class="main">
<div class="header">

<table width="910" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" align="center">
<tr>
<div class="header-top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div align ="center">
<font size="+3" color="white" style="font-family:Arial, Helvetica, sans-serif">CSAB Online Subjects Registration System
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</font>
</div>

<td><div class="header-bottom"></div></td>
<tr>
<td height="250">
<br><br>

<!-- for log in form -->

   <form method="post" name="frmLogin" id="frmLogin" class="login">
   
 <table align="center" cellpadding="0" cellspacing="0" valign="top" border="2" bordercolor="red" width="425" height="265">
<tr>
<td align="center"><font color="black"><b>User ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="name" name="txtUserName"><br><br>
Password: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="txtPassword"></b></font>
<br><br>
		<input type="image" src="include/images/more-btn1.jpg" value="Login">
		
		</div>
		
		</form>
		

</table>


</td>
</table>	
	<!-- Begin Page Content
	
	<div id="container">
		
		

	-->
	
	<!-- End Page Content -->
</div>
<div class="footer">
<!--Template Taken from a Website and Edited by Group1-->

<img src="<?php echo WEB_ROOT;?>admin/include/images/footer.gif" alt="website templates" border="0" height="1" width="1"></a>
<p>&copy; Copyright 2013. This Proposed System was created by Group 1.
</p></div>
</body>

</html>
	
	
	
	
	
		
	