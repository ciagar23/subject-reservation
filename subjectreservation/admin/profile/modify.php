<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_name, user_position, user_address, user_gender, user_birth, user_bdegree, user_gdegree, user_school, user_seminar
        FROM tbl_user
        WHERE user_name = '$session'";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processProfile.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddProfile" id="frmAddProfile">
 <table border="0" cellpadding="5" cellspacing="1" class="entryTable">
    <tr> 
   <th>User Name:</td>
   <td class="content"> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $user_name; ?>">
  
  <tr> 
   <th>First Name:</td>
   <td class="content"> 
    <input name="txtFName" type="text" id="txtFName" value="<?php echo $user_fname; ?>" class="box"></td>
  </tr>
  
  <tr> 
   <th>Last Name:</td>
   <td class="content">
    <input name="txtLName" type="text" class="box" id="txtLName" value="<?php echo $user_lname; ?>"></td>
  </tr>
      
  <tr> 
   <th>Position:</td>
   <td class="content"><?php echo $user_position; ?>
   
  </td>
  </tr>
  
   </tr>
  
  <tr>
   <th align="left">Gender:</td>
   <td class="content">
   
    
   <select name="txtGender" class="box">
     <option value=""> - Select - </option>
     <option>MALE</option>
     <option>FEMALE</option>
  
   </select>
   
  </td>
  </tr>
  
  
  <tr>
  <td colspan="2" align="center"><br><br><i>
  Educational Background</i>
  
  </td>
  <tr>
  
  
  <tr>
   <th align="left">Bachelor's Degree:</td>
   <td class="content">
  <input name="txtBDegree" type="text" class="box" id="txtBDegree" size="50" value="<?php echo $user_bdegree;?>" />
   
  </td>
  </tr>
  
    
  <tr>
   <th align="left">School Graduated:</td>
   <td class="content">
  <input name="txtSchool" type="text" class="box" size="50" value="<?php echo $user_school;?>" />
   
  </td>
  </tr>
  
  <tr>
   <th align="left">Master's Degree:</td>
   <td class="content">
  <input name="txtGDegree" type="text" class="box" size="50" value="<?php echo $user_gdegree;?>" />
   
  </td>
  </tr>
  
  <tr>
   <th align="left">Seminar Attended:</td>
   <td class="content">
  <textarea cols="39" rows="5" name="txtSeminar"> <?php echo $user_seminar;?> </textarea>
   
  </td>
  </tr>


 </table>
 <p align="center"> 
  <input name="btnModifyProfile" type="button" id="btnModifyProfile" value="Modify" onClick="checkAddProfileForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>