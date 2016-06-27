<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<!-- start id-form -->


<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">

		<table cellpadding="5" cellspacing="5">


  <tr> 
   <th >First Name: </th>
   <td> <input name="txtFName" type="text" class="box" id="txtFName" size="50" maxlength="50"></td>
  </tr>
  
  <tr> 
   <th >Last Name: </th>
   <td> <input name="txtLName" type="text" class="box" id="txtLName" size="50" maxlength="50"></td>
  </tr>
  
  <tr> 
   <th >User Name: </th>
   <td> <input name="txtUserName" type="text" class="box" id="txtUserName" size="20" maxlength="20"></td>
  </tr>
  <tr> 
   <th >Password: </th>
   <td> <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="20" maxlength="20"></td>
      
  <tr> 
   <th >Position: </th>
   <td>
   
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
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>