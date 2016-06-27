<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$classcode = (isset($_GET['classcode']) && $_GET['classcode'] > '') ? $_GET['classcode'] : '';

$sql = "SELECT sr_code, sr_student FROM tbl_subjectreservation where sr_code ='$classcode'";
$result = dbQuery($sql);

?> 
      
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h3>Student Enrolled in <?php echo $classcode;?></th>
				</tr>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	if ($i%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	}
	
	$result2 = mysql_query("SELECT * FROM tbl_user where user_name='$sr_student'");
		$show2 = mysql_fetch_array($result2);	
		$sfname= $show2['user_fname'];
		$slname= $show2['user_lname'];
		$course= $show2['user_course'];
	
	$i += 1;
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><?php echo $sfname.' '.$slname; ?></b>
   <td><?php echo $course; ?></b>
   </td>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>   
   </td>
  </tr>
 </table>
