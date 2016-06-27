<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<!-- start id-form -->


<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser">

		<table cellpadding="5" cellspacing="5">


  <tr> 
   <th align="left">First Name: </th>
   <td> <input name="txtFName" type="text" class="box" size="35" maxlength="35"></td>
  </tr>
  
  <tr> 
   <th align="left">Last Name: </th>
   <td> <input name="txtLName" type="text" class="box" size="35" maxlength="35"></td>
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
   <th align="left">ID Number: </th>
   <td> <input name="txtUserName" type="text" class="box" size="20" maxlength="20"></td>
  </tr>
  <tr> 
   <th align="left">Password: </th>
   <td> <input name="txtPassword" type="password" class="box" value="" size="20" maxlength="20"></td>
      
<input type="hidden" name="txtPosition" value="STUDENT">
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