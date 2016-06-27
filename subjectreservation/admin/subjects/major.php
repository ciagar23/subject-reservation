<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT m_id, m_code, m_desc
        FROM tbl_major";
$result = dbQuery($sql);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">
<b><font size="5" color="black">Course:</font></b><br>
    				<table border="0" width="621">
				<tr>
					<th align="left"><h4>Code</th>
					<th align="left"><h4>Description</th>
					<th align="left"><h4>View</th>
					<th align="left"><h4>Edit</th>
					<th align="left"><h4>Delete</th>
					<th align="left"&nbsp;</th>
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
   <b><td><?php echo $m_code; ?></b>
   <td><?php echo $m_desc; ?>
   <td>
   <a href="javascript:viewSem(<?php echo $m_id; ?>);" class="edit">View</a></td>
   <td> 
   <a href="javascript:modifyMajor(<?php echo $m_id; ?>);" class="edit">Edit</a>
   <td>
   <a href="javascript:deleteMajor(<?php echo $m_id; ?>);" class="delete">Delete</a>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="center">
   <a href='#' class="more" onclick="addMajor()">Add Course</a>
   
   </td>
  </tr>
 </table>
