<?php
if (!defined('WEB_ROOT')) {
	exit;
}
		$datenow = date("Y-m-d");
		$date2day = date('Y-m-d', strtotime('-2 day', strtotime($datenow)));
		
		dbQuery("DELETE FROM tbl_subjectreservation
	        WHERE sr_status =0 and sr_date <= '$date2day'");
			
			
		dbQuery("DELETE FROM tbl_grades
	        WHERE g_student='' and g_grades=''");

		
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
  <title>CSA-B Online Subject Registration System</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta http-equiv="Content-Type"
 content="text/html; charset=iso-8859-1">
  <link href="<?php echo WEB_ROOT;?>admin/include/css/style.css" rel="stylesheet" type="text/css">
  <script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<script>
	$(document).ready(function(){		
		$(".addProject").colorbox({width:"440px", inline:true, href:"#add-new-project"});
		$(".addMilestone").colorbox({width:"440px", inline:true, href:"#add-new-milestone"});		
		
	});
</script>
</head>
<body>
<div class="page-out">
<div class="page-in">
<div class="page">
<div class="main">
<div class="header">
<div class="header-top">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div align ="center">
<font size="+3" color="#FFFFFF" style="font-family:Arial, Helvetica, sans-serif">CSAB Online Subject Registration System
<br>
</font>
</div>
</div>
<div class="header-bottom">
</div>
<div class="topmenu">
<ul>
  <li
 style="background: transparent none repeat scroll 0% 50%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; padding-left: 0px;"><a
 href="<?php echo WEB_ROOT;?>admin"><span>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Home
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/index.php?view=aboutus"><span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  About&nbsp;us
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/index.php?view=help"><span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Help
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
  <li><a href="<?php echo $self; ?>?logout"><span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></a></li>
</ul>
</div>
</div>
<div class="content">
<div class="content-right">

<?php if ($sidebar == '') {?>
<!--########################################################################################-->
<div class="mainmenu">
<h2 class="sidebar1">Main Menu</h2>
<ul>
<?php if($position=='ADMIN') { ?>
  <li><a href="<?php echo WEB_ROOT;?>/admin/subjects">Encode Subject</a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/class">Encode Class</a></li>
  <li><a href="<?php echo WEB_ROOT;?>/admin/user">User</a></li>
  <li><a href="<?php echo WEB_ROOT;?>/admin/student">List of Enrolled Students</a></li>
  <li><a href="<?php echo WEB_ROOT;?>/admin/assignteacher">Assign Faculty</a></li>
  <li><a href="<?php echo WEB_ROOT;?>/admin/history">History</a></li>
  <li><a href="<?php echo WEB_ROOT;?>/admin/untagging">Untagging</a></li>
  
<?php } else if($position=='FACULTY') {?>
  <li><a href="<?php echo WEB_ROOT;?>/admin/gradesubmission/upload">Grade Submission</a></li>
  <li><a href="<?php echo WEB_ROOT;?>/admin/gradesubmission/grades/sampleformat.xls">Download Xls Template</a></li>
  <li><a href="<?php echo WEB_ROOT;?>/admin/myclasses">My Classes</a></li>
  
<?php } else if($position=='STUDENT') {?>
  
  
  
  
   <?php $checktag = mysql_num_rows(mysql_query("SELECT * FROM tbl_payment where p_student='$session' and p_status='yes'"));
  
  if ($checktag == 0 )
  {
 ?> 
  <li><a href="<?php echo WEB_ROOT;?>/admin/subjectreservation">Subject Reservation</a></li>
  <?php } else {?>
  
  <li><a href="" onclick="alert('You need to be untagged');" >Subject Reservation</a></li>
  <?php }?>
  
  
  
  
  
  
  
  
  
  
  <li><a href="<?php echo WEB_ROOT;?>/admin/reservedsubjects">Reserved Subjects</a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/semistralrecords/?student=<?php echo $session;?>" target="_blank">View Grades</a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/semistralrecords/?view=formadvancesubject" target="_blank">Print Subject Form</a></li>
  
 <?php $checkpayment = mysql_num_rows(mysql_query("SELECT * FROM tbl_payment where p_student='$session'"));
  
 
  
  if ($checkpayment == 0 )
  {
 ?> 
  <li><a href="<?php echo WEB_ROOT;?>/admin/payment">Payment</a></li>
  <?php } else {
	  
	  if ($checktag ==0)
	  {
	  ?>

  <li><a onclick="alert('Are you sure you want to finalize it?');" href="untagging/process.php?action=tag&username=<?php echo $session;?>">Finalize Reservation</a></li>
  <?php }
  else 
  
  {
	 ?>

  <li><a href="" onclick="alert('You have already paid');">payment</a></li>
  <?php  
	  
	  }
   }?>
  
  
  
  
  
                        
  
<?php } else if($position=='ENCODER') {?>
  <li><a href="<?php echo WEB_ROOT;?>/admin/subjects">Encode Subject</a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/class">Encode Class</a></li>
 
<?php } else if($position=='AREA HEAD') {?>
  <li><a href="<?php echo WEB_ROOT;?>admin/evaluation">Evaluate Subjects</a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/evaluatedstudent/?view=now">Evaluated Students Today</a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/evaluatedstudent">Total Evaluated Students</a></li>
  
<?php } else {}?>
  
</ul>
</div>
<div class="contact">
<h2 class="sidebar2">Contact</h2>
<div class="contact-detail">
<p class="green"><strong>Colegio San Agustin-Bacolod</strong></p>
<p><strong>Adress :</strong> BS Aquino Drive,Bacolod City;&nbsp;&nbspNegros Occidental, Philippines 6100<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</p>
<p><strong>E-mail :</strong> csab.csit.edu20.org</p>
<p><strong>Phone :</strong> &nbsp;&nbsp;&nbsp;434-6123<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</p>
</div>
</div>
</div>
<!--#####################################################################################-->
<?php } else {
require_once $sidebar;
}?>



<div class="content-left">
<div class="row1">
<h1 class="title">Welcome <span><?php echo $fname;?> <?php echo $lname;?></span> (<?php echo $position;?>)!</h1>
<p> <?php echo $successMessage;?> </p>
<p> <?php echo $errorMessage;?> </p>
<p> <?php require_once $content;?> </p>
</div>
</div>
</div>
<div class="footer">
<!--Designed by-->
<img src="<?php echo WEB_ROOT;?>admin/include/images/footer.gif" alt="html templates" border="0" height="1" width="1"></a>
<!--In partnership with--><a href="http://websitetemplates.net">
<img src="<?php echo WEB_ROOT;?>admin/include/images/footer.gif" alt="website templates" border="0" height="1" width="1"></a>
<p>&copy; Copyright 2013. This Proposed System was created by Group 1
</p>
<ul>
  <li style="border-left: medium none;"><a href="index.html"><span>Home</span></a></li>
  <li><a href="#"><span>About&nbsp;us</span></a></li>
  <li><a href="#"><span>Help</span></a></li>
  <li style="padding-right: 0px;"><a href="<?php echo $self; ?>?logout"><span>Logout</span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</body>
</html>