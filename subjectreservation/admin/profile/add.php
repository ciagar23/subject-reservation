<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 



<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">


 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="50%" >First Name</td>
   <td class="content"> <input name="txtFName" type="text" class="box" id="txtFName" size="50" maxlength="50"></td>
  </tr>
  
  <tr> 
   <td >Last Name</td>
   <td class="content"> <input name="txtLName" type="text" class="box" id="txtLName" size="50" maxlength="50"></td>
  </tr>
  
  <tr> 
   <td >User Name</td>
   <td class="content"> <input name="txtUserName" type="text" class="box" id="txtUserName" size="20" maxlength="20"></td>
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
     <option>TEACHER</option>
  
   </select>
   
   
  </td>
  </tr>
  
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center" class="content"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </div>
</form>