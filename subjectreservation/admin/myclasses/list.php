<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';


$sql = "SELECT a_classcode, a_teacher FROM tbl_assignteacher WHERE a_teacher='$session' ";
$result = dbQuery($sql);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h4>Code</th>
					<th align="left"><h4>Description</th>
					<th align="left"><h4>Schedule</th>
					<th align="left"><h4>Room</th>
					<th align="left"><h4>Section</th>
					<th align="left"><h4>Pre-Requisite</th>
				</tr>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	}
	
	
	$sql2 = "SELECT c_id, c_code, c_subjcode, c_schedstart, c_schedend, c_schedday, c_room, c_section 
        FROM tbl_class where c_code ='$a_classcode'";
$result2 = dbQuery($sql2);
	extract(dbFetchAssoc($result2));
	
	
		$sql1 = "SELECT s_desc, s_prereq
        FROM tbl_subject where s_code='$c_subjcode'";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$desc= $show['s_desc'];
		$prereq= $show['s_prereq'];
	
	$i += 1;
	
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><a href='<?php echo WEB_ROOT;?>admin/myclasses/?view=students&classcode=<?php echo $c_code; ?>'><?php echo $c_code; ?></a></b>
   <td>
   <?php echo $desc;?>
   <td>
   <?php echo $c_schedstart;?> - <br><?php echo $c_schedend;?> <br>(<?php echo $c_schedday;?>)
   <td>
   <?php echo $c_room;?>
   <td>
   <?php echo $c_section;?>
   <td>
   <?php echo $prereq;?>
   <td>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
