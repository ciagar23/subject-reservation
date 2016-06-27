<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_name, user_position, user_address, user_gender, user_birth, user_birth, user_bdegree, user_gdegree, user_school, user_seminar
        FROM tbl_user
        WHERE user_name = '$session'";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table border="0" cellpadding="5" cellspacing="1" class="entryTable">
    <tr> 
   <th align="left">User Name:</td>
   <td class="content"> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
  
  <tr> 
   <th align="left">Name:</td>
   <td class="content"> 
    <?php echo $user_fname; ?> <?php echo $user_lname; ?>
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $userId; ?>"></td>
  </tr>
<tr>
   <th align="left">Position:</td>
   <td class="content">
  <?php echo $position;?>
   
  </td>
  </tr>
  
  <tr>
   <th align="left">Gender:</td>
   <td class="content">
  <?php echo $user_gender;?>
   
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
  <?php echo $user_bdegree;?>
   
  </td>
  </tr>
  
    
  <tr>
   <th align="left">School Graduate:</td>
   <td class="content">
  <?php echo $user_school;?>
   
  </td>
  </tr>
  
  <tr>
   <th align="left">Master's Degree:</td>
   <td class="content">
  <?php echo $user_gdegree;?>
   
  </td>
  </tr>
  
  <tr>
   <th align="left">Seminar Attended:</td>
   <td class="content">
  <?php echo $user_seminar;?>
   
  </td>
  </tr>


 </table>
 <p align="center"> 
