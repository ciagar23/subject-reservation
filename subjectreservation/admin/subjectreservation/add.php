<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<!-- start id-form -->

<form action="processEvaluation.php?action=student" method="post" enctype="multipart/form-data" name="frmStudent">
 <table border="0" cellpadding="5" cellspacing="1">
    <tr> 
   <td width="150" class="label">Student's ID Number</td>
   <td> <input name="IdNumber" type="text" class="box" id="txtsName" size="10" maxlength="50"> <input name="btnAddUser" type="button" id="btnAddUser" value="Proceed" onClick="checkIdnumberForm();" class="box">
  
   </table>

  

</form>