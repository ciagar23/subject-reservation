<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['MajorId']) && (int)$_GET['MajorId'] > 0) {
	$MajorId = (int)$_GET['MajorId'];
} else {
	header('Location: index.php');
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT m_id, m_code, m_desc
        FROM tbl_major
        WHERE m_id = $MajorId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processSubjects.php?action=modifyMajor" method="post" enctype="multipart/form-data" name="frmAddMajor" id="frmAddMajor">

		<table cellpadding="5" cellspacing="5">
        <input type="hidden" value="<?php echo $m_id;?>" name="txtId" />
         <tr> 
   <th >Subject Code: </th>
   <td> <input name="txtCode" type="text" class="box" size="10" value="<?php echo $m_code;?>" maxlength="50"></td>
  </tr>
  
  <tr> 
   <th >Description: </th>
   <td> <textarea name="txtDesc" cols="50" rows="5"><?php echo $m_desc;?></textarea></td>
  </tr> 
  <tr> 
  <td class="2" align="right">
  <table>
  <tr>
   <td><a href='#' class="more" onclick="checkAddMajorForm();">Modify</a></td>
   <td>  <a href='#' class="more" onclick="window.location.href='index.php';">Back</a></td>
  </tr>  
  </table>
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 <p align="center"> 
   
  
 </p>
</form>