<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<!-- start id-form -->


<form action="processSubjects.php?action=addMajor" method="post" enctype="multipart/form-data" name="frmAddMajor" id="frmAddMajor">

		<table cellpadding="5" cellspacing="5">
         <tr> 
   <th >Subject Code: </th>
   <td> <input name="txtCode" type="text" class="box" size="10" maxlength="50"></td>
  </tr>
  
  <tr> 
   <th >Description: </th>
   <td> <textarea name="txtDesc" cols="50" rows="5"></textarea></td>
  </tr>  
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center"> 
  <input name="btnAddMajor" type="button" id="btnAddMajor" value="Add Major" onClick="checkAddMajorForm();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>