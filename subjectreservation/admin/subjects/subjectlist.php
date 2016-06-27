<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';

$sql = "SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear
        FROM tbl_subject
		WHERE s_semyear='$cur'";
$result = dbQuery($sql);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h4>Code</th>
					<th align="left"><h4>Description</th>
					<th align="left"><h4>Lec</th>
					<th align="left"><h4>Lab</th>
					<th align="left"><h4>Unit</th>
					<th align="left"><h4>Pre-Requisite</th>
					<th align="left"><h4>Delete</th>
				</tr>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	}
	
	$i += 1;
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <a href="javascript:deleteSubject(<?php echo $s_id; ?>);">Delete</a>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
