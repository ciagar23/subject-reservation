<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$fname = isset($_GET['fname']) ? $_GET['fname'] : '';
$lname = isset($_GET['lname']) ? $_GET['lname'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';
$pw = isset($_GET['pw']) ? $_GET['pw'] : '';

?> 
<!-- start id-form -->


<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser">

		<table cellpadding="5" cellspacing="5">


  <tr> 
   <th align="left">First Name: </th>
   <td> <input name="txtFName" type="text" value="<?PHP echo $fname;?>" class="box" size="50" maxlength="50"></td>
  </tr>
  
  <tr> 
   <th align="left">Last Name: </th>
   <td> <input name="txtLName" type="text" value="<?PHP echo $lname;?>" class="box" size="50" maxlength="50"></td>
  </tr>
  
   <tr> 
   <th align="left">Major: </th>
   <td>      <?php

$sqls = "SELECT m_code
        FROM tbl_major";
$results = dbQuery($sqls);

?> 
<select name="txtMajor" >

   <option value="">- Select -</option>
<?php
while($rows = dbFetchAssoc($results)) {
	extract($rows);

	$i += 1;
?>
   <option><?php echo $m_code; ?></option>

<?php
} // end while

?>
</select></td>
  </tr>  
   <tr> 
   <th align="left">Year: </th>
   <td>   <select name="txtYear" class="box">
     <option value=""> - Select - </option>
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
     <option>5</option>
   </select></td>
  </tr>
  
   <tr> 
   <th align="left">Student Status: </th>
   <td>
   
    <select name="txtStudentStatus" class="box">
     <option value=""> - Select Student Status - </option>
     <option>Regular</option>
     <option>Irregular</option>
     <option>Returness</option>
     <option>Transferees</option>
   </select>
    
  <tr> 
   <th align="left">Age: </th>
   <td> <input name="txtAge" type="text" class="box" size="2" maxlength="20"></td>
  </tr>
  
   <tr> 
   <th align="left">Gender: </th>
   <td>
   
    <select name="txtGender" class="box">
     <option value=""> - Select Gender - </option>
     <option>Male</option>
     <option>Female</option>
     
   </select>
   
  <tr> 
   <th align="left">Date of Birth: </th>
   <td> <input name="txtDateofBirth" type="text" class="box" size="20" maxlength="20"></td>
  </tr>
  
   <tr> 
   <th align="left">E-mail Address: </th>
   <td> <input name="txtEmailAddress" type="text" class="box" size="20" maxlength="100"></td>
  </tr>
  
   <tr> 
   <th align="left">Street / City Address: </th>
   <td> <input name="txtStreetCityAddress" type="text" class="box" size="50" maxlength="100"></td>
  </tr>
  
  <tr> 
   <th align="left">Mother's Name: </th>
   <td> <input name="txtMothersMaidenName" type="text" class="box" size="20" maxlength="20"></td>
  </tr>
  
   
  <tr> 
   <th align="left">Tel/cell: </th>
   <td> <input name="txtMTelcell" type="text" class="box" size="20" maxlength="20"></td>
  </tr>
  
   
  <tr> 
   <th align="left">Father's Name: </th>
   <td> <input name="txtFathersName" type="text" class="box" size="20" maxlength="20"></td>
  </tr>
  
   
  <tr>
   <th align="left">: Tel/cell:</th>
   <td> <input name="txtFTelcell" type="text" class="box" size="20" maxlength="20"></td>
  </tr>
    
  <tr> 
   <th align="left">User Name: </th>
   <td> <input name="txtUserName" type="text"  value="<?PHP echo $username;?>" class="box" size="20" maxlength="20"></td>
  </tr>
  
  <tr> 
   <th align="left">Password: </th>
   <td> <input name="txtPassword" type="password"  value="<?PHP echo $pw;?>" class="box" value="" size="20" maxlength="20"></td>
      
	   <input name="txtPosition" type="hidden" value='STUDENT'>

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