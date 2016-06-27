<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';

$sql = "SELECT e_id, e_code, e_evaluator
        FROM tbl_evaluation WHERE e_student='$session'";
$result = dbQuery($sql);

		$result2 = mysql_query("SELECT * FROM tbl_user where user_name='$session'");
		$show2 = mysql_fetch_array($result2);	
		$sfname= $show2['user_fname'];
		$slname= $show2['user_lname'];
		$course= $show2['user_course'];
		
		$result3 = mysql_query("SELECT * FROM tbl_major where m_code='$course'");
		$show3 = mysql_fetch_array($result3);	
		$majorId= $show3['m_id'];
?> 
<div class="mainmenu">
<h2 class="sidebar2">Approved Subjects</h2>
<ul>

           
<form action="processEvaluation.php?action=DeleteEvaluation" method="post"  name="frmEvaluation" class="jNice">


<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	
	$i += 1;
	
?>

		<li><a href="<?php echo WEB_ROOT;?>/admin/subjectreservation/?code=<?php echo $e_code; ?>"><?php echo $e_code; ?> </a><li>

<?php
} // end while

?>
  
</ul>
</div><div class="mainmenu">
<h2 class="sidebar2">Reserved Classes</h2>
<ul>
           
<form action="processEvaluation.php?action=DeleteEvaluation" method="post"  name="frmEvaluation" class="jNice">


<?php

$sql2 = "SELECT sr_id, sr_code
        FROM tbl_subjectreservation WHERE sr_student='$session'";
$result2 = dbQuery($sql2);


while($row2 = dbFetchAssoc($result2)) {
	extract($row2);
	
	
	$i += 1;
	
?>

		<li><a href="javascript:deleteSubjectReservation(<?php echo $sr_id; ?>);"><?php echo $sr_code; ?> </a><li>

<?php
} // end while

?>
  
</ul>
</div>
</div>
</form>