<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_name, user_position
        FROM tbl_user
        WHERE user_id = $userId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
    <tr> 
   <td>User Name</td>
   <td class="content"> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
  
  <tr> 
   <td >First Name</td>
   <td class="content"> 
    <input name="txtFName" type="text" id="txtFName" value="<?php echo $user_fname; ?>" class="box">
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $userId; ?>"></td>
  </tr>
  
  <tr> 
   <td >Last Name</td>
   <td class="content">
    <input name="txtLName" type="text" class="box" id="txtLName" value="<?php echo $user_lname; ?>"></td>
  </tr>
 
  <tr> 
   <td >Password</td>
   <td class="content"> <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="20" maxlength="20"></td>
      
  <tr> 
   <td >Position</td>
   <td class="content">
    
   <select name="txtPosition" class="box">
     <option value=""> - Select Position - </option>
     <option>ADMIN</option>
     <option>FACULTY</option>
     <option>STUDENT</option>
     <option>ENCODER</option>
     <option>AREA HEAD</option>
  
   </select>
   
  </td>
  </tr>

 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="button" id="btnModifyUser" value="Modify User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>