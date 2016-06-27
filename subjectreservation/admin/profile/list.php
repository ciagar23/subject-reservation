<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT user_id, user_name, user_regdate, user_last_login, user_fname, user_lname, user_position
        FROM tbl_user where user_name like '%$search%'
		ORDER BY user_name";
$result = dbQuery($sql);

?> 
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
           
                                
                                <form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">

        <thead>
    	<tr>
            <th scope="col" class="rounded">User Name</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
    </thead>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fname; ?> <?php echo $user_lname; ?></b>,<?php echo $user_position; ?></td>
   
   <td width="120" align="center"><a href="javascript:changePassword(<?php echo $user_id; ?>);" class="ico edit"><img src="<?php echo WEB_ROOT; ?>admin/include/images/user_edit.png" alt="" title="" border="0" /></a></td>
   <td width="70" align="center"><a href="javascript:deleteUser(<?php echo $user_id; ?>);" class="ico del"><img src="<?php echo WEB_ROOT; ?>admin/include/images/trash.png" alt="" title="" border="0" /></a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right">
   <div class="content"><input name="btnAddUser" type="button"  value="Add User" class="add-button" onClick="addUser()"></div></td>
  </tr>
 </table>
