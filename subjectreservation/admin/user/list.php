<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$p = (isset($_GET['p']) && $_GET['p'] > '') ? $_GET['p'] : '';

$rowsPerPage = 10;
$queryString = '';
$sql = "SELECT user_id, user_name, user_regdate, user_last_login, user_fname, user_lname, user_position
        FROM tbl_user where user_position like '%$p%'
		ORDER BY user_fname";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);
$count = mysql_num_rows(dbQuery($sql));

?> 
<form>
<h4>Filter by Position:
<select name="p">
<option value=""> - Select -</option>
<option>ADMIN</option>
<option>AREA HEAD</option>
<option>ENCODER</option>
<option>FACULTY</option>
<option>STUDENT</option>
</select>
<input type="submit" value="submit"></h4>
</form>
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
if (dbNumRows($result) > 0) {
	$i = 0;
	
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
<td>  <tr> 
   <td colspan="5" align="center">
   <?php 
echo $pagingLink;
}
   ?>
  
  <tr> 
   <td colspan="5" align="center">
   <a href='#' class="more" onclick="addUser()">Add User</a>
   
   </td>
  </tr>
 </table>
