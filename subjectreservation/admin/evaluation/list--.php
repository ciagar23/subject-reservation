<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';

$sql = "SELECT c_id, c_code, c_subjcode, c_schedstart, c_schedend, c_schedday, c_room, c_section 
        FROM tbl_class";
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
					<th align="left"><h3>Delete</th>
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
        FROM tbl_subject where s_code='$c_subjcode'";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$desc= $show['s_desc'];
		$prereq= $show['s_prereq'];
	
	
	$i += 1;
	
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><?php echo $c_code; ?></b>
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
   <a href="javascript:deleteClass(<?php echo $c_id; ?>);">Delete</a>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
