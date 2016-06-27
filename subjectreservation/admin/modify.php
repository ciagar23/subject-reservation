<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

$sql = "SELECT user_fname, user_lname, user_name, user_position, user_year, user_course
        FROM tbl_user
        WHERE user_id = $userId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmModifyUser" id="frmModifyUser">
<table cellpadding="5" cellspacing="5"  id="id-form">
    <tr> 
   <th align="left">User ID: </th>
   <td><font color="blue"><b> <?php echo $user_name; ?></b></font></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
  
  <tr> 
   <th align="left">First Name</th>
   <td> 
    <input name="txtFName" type="text" id="txtFName" value="<?php echo $user_fname; ?>" class="box">
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $userId; ?>"></td>
  </tr>
  
  <tr> 
   <th align="left">Last Name</th>
   <td>
    <input name="txtLName" type="text" class="box" id="txtLName" value="<?php echo $user_lname; ?>"></td>
  </tr>
   <tr> 
   <th align="left">Course: </th>
   <td><input name="txtCourse" type="text" class="box" size="10" maxlength="10">
   <font size="3"><b>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   Year:</b></font>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input name="txtYear" type="int" class="box" size="2" maxlength="1"></td>
  </tr>
  <tr> 
   <th align="left">Password</th>
   <td> <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="20" maxlength="20"></td>

 </table>
 <p align="center">
<input name="btnModifyUser" type="button" id="btnModifyUser" value="&nbsp;Modify User&nbsp;" onClick="checkModifyUserForm();" class="form-modify">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="&nbsp;Cancel&nbsp;" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>