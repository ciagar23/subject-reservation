<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';

$sql = "SELECT sr_id, sr_code, sr_subjcode, sr_student, sr_schedstart, sr_schedday
        FROM tbl_subjectreservation where sr_student='$session'";
$result = dbQuery($sql);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h3>Code</th>
					<th align="left"><h3>Description</th>
					<th align="left"><h3>Schedule</th>
					<th align="left"><h3>Room</th>
					<th align="left"><h3>Section</th>
					<th align="left"><h3>Pre-Requisite</th>
				</tr>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	}
	
		$sql1 = "SELECT s_desc, s_prereq
        FROM tbl_subject where s_code='$sr_subjcode'";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$desc= $show['s_desc'];
		$prereq= $show['s_prereq'];
		
		
		$sql2 = "SELECT *
        FROM tbl_class where c_code='$sr_code'";
		$result2 = mysql_query($sql2);
		$show2 = mysql_fetch_array($result2);	
		$c_schedend= $show2['c_schedend'];
		$c_room= $show2['c_room'];
		$c_section= $show2['c_section'];
		$c_schedday= $show2['c_schedday'];
	
	$i += 1;
	
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><?php echo $sr_code; ?></b>
   <td>
   <?php echo $desc;?>
   <td>
   <?php echo $sr_schedstart;?> - <br><?php echo $c_schedend;?> <br>(<?php echo $c_schedday;?>)
   <td>
   <?php echo $c_room;?>
   <td>
   <?php echo $c_section;?>
   <td>
   <?php echo $prereq;?>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
