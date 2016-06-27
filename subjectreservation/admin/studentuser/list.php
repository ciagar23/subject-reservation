<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT user_id, user_name, user_regdate, user_last_login, user_fname, user_lname, user_position
        FROM tbl_user where user_name like '%$search%'
		ORDER BY user_fname";
$result = dbQuery($sql);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h3>User Name</th>
					<th align="left"><h3>Position</th>
					<th align="left"><h3>Edit</th>
					<th align="left"><h3>Delete</th>
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
   <td><?php echo $user_fname; ?> <?php echo $user_lname; ?></b>
   <td><?php echo $user_position; ?></td>
   <td>
   <a href="javascript:changePassword(<?php echo $user_id; ?>);" class="edit">Edit</a>
   <td>
   <a href="javascript:deleteUser(<?php echo $user_id; ?>);" class="delete">Delete</a>
   
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
   <a href='#' class="more" onclick="addUser()">add user</a>
   
   </td>
  </tr>
 </table>
