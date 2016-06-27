<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';
$teacher = $_SESSION['teacher'];

$sql = "SELECT a_id, a_subjcode, a_classcode
        FROM tbl_assignteacher WHERE a_teacher='$teacher'";
$result = dbQuery($sql);

		$result2 = mysql_query("SELECT * FROM tbl_user where user_name='$teacher'");
		$show2 = mysql_fetch_array($result2);	
		$sfname= $show2['user_fname'];
		$slname= $show2['user_lname'];
		$course= $show2['user_course'];
		
		$result3 = mysql_query("SELECT * FROM tbl_major where m_code='$course'");
		$show3 = mysql_fetch_array($result3);	
		$majorId= $show3['m_id'];
?> 

<h3><font color="#009933">teacher: (<?php echo $teacher;?>)<?php echo $sfname;?> <?php echo $slname;?>,<?php echo $course?> </font></h3>
<div class="mainmenu">
<h2 class="sidebar1"><?php echo $teacher;?>'s Classes</h2>
<ul>
           
<form action="process.php?action=DeleteEvaluation" method="post"  name="frmEvaluation" class="jNice">


<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	
	$i += 1;
	
?>
		
		
		<li><a href="javascript:deleteClass(<?php echo $a_id; ?>);"><?php echo $a_classcode; ?> </a><li>

<?php
} // end while

?>
</form>
<br>
<b><font size="2" color="black"><a href="<?php echo WEB_ROOT;?>admin/evaluation/">Done</a></font>
  
</ul>
</div>
</div>
