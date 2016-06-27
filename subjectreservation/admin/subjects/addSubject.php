<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';
$MajorId = (isset($_GET['MajorId']) && $_GET['MajorId'] > '') ? $_GET['MajorId'] : '';
?> 
<!-- start id-form -->


<form action="processSubjects.php?action=addSubject" method="post" enctype="multipart/form-data" name="frmAddSubject">
<input type="hidden" value="<?php echo $cur;?>" name="txtCur" />
<input type="hidden" value="<?php echo MajorId;?>" name="txtMajorId" />
		<table cellpadding="5" cellspacing="5">
         <tr> 
   <th align="left">Subject Code: </th>
   <td> <input name="txtCode" type="text" size="10" maxlength="50"></td>
  </tr>
  
  <tr> 
   <th align="left">Description: </th>
   <td> <input name="txtDesc" type="text" size="50" maxlength="100"></td>
  </tr> 
  <tr> 
   <th align="left">Lecture: </th>
   <td> <input name="txtLec" type="text" size="10" maxlength="1"  onKeyUp="checkNumber(this);"></td>
  </tr> 
  <tr> 
   <th align="left">Laboratory: </th>
   <td> <input name="txtLab" type="text" size="10" maxlength="1"  onKeyUp="checkNumber(this);"></td>
  </tr> 
  <tr> 
   <th align="left">Unit(s): </th>
   <td> <input name="txtUnit" type="text" size="10" maxlength="1"  onKeyUp="checkNumber(this);"></td>
  </tr> 
  <tr> 
   <th align="left">Pre-Requisite): </th>
   <td> <input name="txtPrereq" type="text" size="10" maxlength="50"></td>
  </tr>  
 </table>
 
 <div align="center"> 
  <input name="btnAddMajor" type="button" id="btnAddMajor" value="Add Subject" onClick="checkAddSubjectForm();" class="form-add"> 
 </div>
</form>
<?php require_once 'subjectlist.php'; ?>