<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';
$MajorId = (isset($_GET['MajorId']) && $_GET['MajorId'] > '') ? $_GET['MajorId'] : '';
?> 
<!-- start id-form -->


<form action="processClass.php?action=add" method="post" enctype="multipart/form-data" name="frmAddClass">
		<table cellpadding="5" cellspacing="5">
         <tr> 
   <th >Subject Code: </th>
   <td>
   <?php

$sqls = "SELECT s_id, s_code
        FROM tbl_subject";
$results = dbQuery($sqls);

?> 
<select name="SubjCode" >

<?php
while($rows = dbFetchAssoc($results)) {
	extract($rows);

	$i += 1;
?>
   <option><?php echo $s_code; ?></option>

<?php
} // end while

?>
</select>

   
   
   </td>
  </tr>
<tr> 
   <th >Class Code: </th>
   <td> <input name="ClassCode" type="text" size="10" maxlength="50"></td>
  </tr>
   <tr> 
   <th colspan="2" align="left">Start Time: 
      <select name="txtFrom" class="box">
     <option value=""> - Select- </option>
     <option>7:30 AM</option>
     <option>8:00 AM</option>
     <option>8:30 AM</option>
     <option>9:00 AM</option>
     <option>9:30 AM</option>
     <option>10:00 AM</option>
     <option>10:30 AM</option>
     <option>11:00 AM</option>
     <option>11:30 AM</option>
     <option>12:00 AM</option>
     <option>12:30 AM</option>
     <option>1:00 PM</option>
     <option>1:30 PM</option>
     <option>2:00 PM</option>
     <option>2:30 PM</option>
     <option>3:00 PM</option>
     <option>3:30 PM</option>
     <option>4:00 PM</option>
     <option>4:30 PM</option>
     <option>5:00 PM</option>
     <option>5:30 PM</option>
     <option>6:00 PM</option>
     <option>6:30 PM</option>
     <option>7:00 PM</option>
     <option>7:30 PM</option>
     <option>8:00 PM</option>
     <option>8:30 PM</option>
     <option>9:00 PM</option>
     <option>9:30 PM</option>
   </select>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
End Time:
      <select name="txtTo" class="box">
     <option value=""> - Select- </option>
     <option>7:30 AM</option>
     <option>8:00 AM</option>
     <option>8:30 AM</option>
     <option>9:00 AM</option>
     <option>9:30 AM</option>
     <option>10:00 AM</option>
     <option>10:30 AM</option>
     <option>11:00 AM</option>
     <option>11:30 AM</option>
     <option>12:00 AM</option>
     <option>12:30 AM</option>
     <option>1:00 PM</option>
     <option>1:30 PM</option>
     <option>2:00 PM</option>
     <option>2:30 PM</option>
     <option>3:00 PM</option>
     <option>3:30 PM</option>
     <option>4:00 PM</option>
     <option>4:30 PM</option>
     <option>5:00 PM</option>
     <option>5:30 PM</option>
     <option>6:00 PM</option>
     <option>6:30 PM</option>
     <option>7:00 PM</option>
     <option>7:30 PM</option>
     <option>8:00 PM</option>
     <option>8:30 PM</option>
     <option>9:00 PM</option>
     <option>9:30 PM</option>
   </select>
   
   </td>
  </tr>
  
  <tr>
  <td colspan="2">
  <input type="checkbox" value="M" name="txtM" /> Monday
  <input type="checkbox" value="T" name="txtT" /> Tuesday
  <input type="checkbox" value="W" name="txtW" > Wednesday
  </input><br> 
  <input type="checkbox" value="Th" name="txtTh" /> Thursday
  <input type="checkbox" value="F" name="txtF" /> Friday
  <input type="checkbox" value="S" name="txtS" /> Saturday
  
  
  </td>
  
  
  
  
  <tr> 
   <th >Max Number of Students: </th>
   <td> <input name="maxStud" type="text" size="10"   onKeyUp="checkNumber(this);"></td>
  </tr> 
  
  <tr> 
   <th >Room: </th>
   <td> <input name="Room" type="text" size="10"></td>
  </tr> 
  <tr> 
   <th >Class Section: </th>
   <td> <input name="ClassSec" type="text" size="10"></td>
  </tr>   
 </table>
 
 <div align="center"> 
  <input name="btnAddMajor" type="button" id="btnAddMajor" value="Add Class" onClick="checkAddClassForm();" class="form-add"> 
 </div>
</form>
<?php require_once 'list.php'; ?>