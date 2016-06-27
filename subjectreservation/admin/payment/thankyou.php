<?php 
$sql = "SELECT user_id, user_fname,user_lname,user_name, user_password, user_position, user_regdate,user_course, user_StudentStatus, user_Age, user_Gender, user_DateofBirth, user_EmailAddress, user_StreetCityAddress, user_MothersMaidenName, user_MTelcell, user_FathersName, user_FTelcell
        FROM tbl_user
        WHERE user_name = '$session'";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));

$codes = date('d') . date('t') . date ('y') . $user_id;

?>
<?php
$sql = "SELECT p_student, p_date, p_cNum, p_amount, p_cType, p_cValidNum , p_expMonth , p_expYear , p_chFname , p_chLname
	FROM tbl_payment
	WHERE p_student = '$session'";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));
?>

<h1><div align ="center"><font color="red"><b>UNOFFICIAL RECEIPT</font></b><br></div></h1>
<b><font size='+2'>Colegio San Agustin - Bacolod </font><br><b>
Benigno S. Aquino Drive<br>
Bacolod City<br>
Tel. No. (034) 432-2471<br><br>

<font color = "red"> Reference Code: <?php echo $codes;?></font><br><br>
<b>RECEIVED FROM:</b>&nbsp;&nbsp;&nbsp;<font size = '+1'><?php echo $user_lname.', '.$user_fname ;?><br></font><br>
<b>ADDRESS:</b><?php echo $user_StreetCityAddress;?><br>
<br>
<div align ="center"><font size ='+3'> EXACTLY&nbsp;<?php echo $p_amount;?>&nbsp;PESOS ONLY </font></div><br>
<br>
<font color = "red"> IMPORTANT:</font> This is not the official receipt, please take note of the Reference Code to be presented
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;during payment.




