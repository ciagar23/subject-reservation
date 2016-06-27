<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';
$student = $_SESSION['student'];

$sql = "SELECT e_id, e_code, e_evaluator
        FROM tbl_evaluation WHERE e_student='$student'";
$result = dbQuery($sql);

		$result2 = mysql_query("SELECT * FROM tbl_user where user_name='$student'");
		$show2 = mysql_fetch_array($result2);	
		$sfname= $show2['user_fname'];
		$slname= $show2['user_lname'];
		$course= $show2['user_course'];
		
		$result3 = mysql_query("SELECT * FROM tbl_major where m_code='$course'");
		$show3 = mysql_fetch_array($result3);	
		$majorId= $show3['m_id'];
?> 

<h3><font color="#009933">Student: (<?php echo $student;?>)<?php echo $sfname;?> <?php echo $slname;?>,<?php echo $course?> </font></h3>
<center><a href="<?php echo WEB_ROOT;?>admin/semistralrecords/?student=<?php echo $student;?>" target="_blank">Semestral Record</a><br><br></center>
<div class="mainmenu">
<h2 class="sidebar1">Evaluated Subjects</h2>
<ul>
           
<form action="processEvaluation.php?action=DeleteEvaluation" method="post"  name="frmEvaluation" class="jNice">


<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	
	$i += 1;
	
?>
		
		
		<li><a href="javascript:deleteEvaluation(<?php echo $e_id; ?>);"><?php echo $e_code; ?> </a><li>

<?php
} // end while

?>
</form>
<br>
<b><font size="2" color="black"><a href="<?php echo WEB_ROOT;?>admin/evaluation/">Finish Evaluation</a></font>
  
</ul>
</div>
</div>
