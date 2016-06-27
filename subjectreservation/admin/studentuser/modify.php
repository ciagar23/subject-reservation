<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

$sql = "SELECT user_fname,user_lname,user_name, user_password, user_position, user_regdate,user_course, user_StudentStatus, user_Age, user_Gender, user_DateofBirth, user_EmailAddress, user_StreetCityAddress, user_MothersMaidenName, user_MTelcell, user_FathersName, user_FTelcell
        FROM tbl_user
        WHERE user_id = $userId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
    <tr> 
   <td>User Name: </td>
   <td> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
  
  <tr> 
   <td >First Name</td>
   <td> 
    <input name="txtFName" type="text" id="txtFName" value="<?php echo $user_fname; ?>" class="box">
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $userId; ?>"></td>
  </tr>
  
  <tr> 
   <td >Last Name</td>
   <td>
    <input name="txtLName" type="text" class="box" id="txtLName" value="<?php echo $user_lname; ?>"></td>
  </tr>
 
   <tr> 
   <th >Major: </th>
   <td> <input name="txtMajor" type="text" class="box" size="20" value="<?php echo $user_course; ?>" maxlength="20"></td>
  </tr>
  
   <tr> 
   <th >Student Status: </th>
   <td>
   
    <select name="txtStudentStatus" class="box">
     <option value=""> - Select Student Status - </option>
     <option>Regular</option>
     <option>Irregular</option>
     <option>Returness</option>
     <option>Transferees</option>
   </select>
    
  <tr> 
   <th >Age: </th>
   <td> <input name="txtAge" type="text" class="box" size="20"value="<?php echo $user_Age; ?>" maxlength="20"></td>
  </tr>
  
   <tr> 
   <th >Gender: </th>
   <td>
   
    <select name="txtGender" class="box">
     <option value=""> - Select Gender - </option>
     <option>Male</option>
     <option>Female</option>
     
   </select>
   
  <tr> 
   <th >Date of Birth: </th>
   <td> <input name="txtDateofBirth" type="text" class="box" size="20" value="<?php echo $user_DateofBirth; ?>" maxlength="20"></td>
  </tr>
  
   <tr> 
   <th >E-mail Address: </th>
   <td> <input name="txtEmailAddress" type="text" class="box" size="20"value="<?php echo $user_EmailAddress; ?>" maxlength="20"></td>
  </tr>
  
   <tr> 
   <th >Street / City Address: </th>
   <td> <input name="txtStreetCityAddress" type="text" class="box" size="20" value="<?php echo $user_StreetCityAddress; ?>" maxlength="20"></td>
  </tr>
  
  <tr> 
   <th >Mother's Maiden Name: </th>
   <td> <input name="txtMothersMaidenName" type="text" class="box" size="20"value="<?php echo $user_MothersMaidenName; ?>"  maxlength="20"></td>
  </tr>
  
   
  <tr> 
   <th >Tel/cell: </th>
   <td> <input name="txtMTelcell" type="text" class="box" size="20"value="<?php echo $user_MTelcell; ?>" maxlength="20"></td>
  </tr>
  
   
  <tr> 
   <th >Father's Name: </th>
   <td> <input name="txtFathersName" type="text" class="box" size="20"value="<?php echo $user_FathersName; ?>" maxlength="20"></td>
  </tr>
  
   
  <tr>
   <th >: Tel/cell:</th>
   <td> <input name="txtFTelcell" type="text" class="box" size="20"value="<?php echo $user_FTelcell; ?>" maxlength="20"></td>
  </tr>
    
  <tr> 
   <th >User Name: </th>
   <td> <input name="txtUserName" type="text" class="box" size="20"value="<?php echo $user_name; ?>" maxlength="20"></td>
  </tr>
  
  <tr> 
   <th >Password: </th>
   <td> <input name="txtPassword" type="password" class="box" value="" size="20"value="<?php echo $user_Password; ?>" maxlength="20"></td>
      
	  
   
 <input name="txtPosition" type="hidden" class="box" size="20"value="<?php echo $user_position; ?>" maxlength="20">
   

 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="button" id="btnModifyUser" value="Modify User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>