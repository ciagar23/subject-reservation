<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$MajorId = (isset($_GET['MajorId']) && $_GET['MajorId'] > '') ? $_GET['MajorId'] : '';

$sql = "SELECT m_id, m_code, m_desc
        FROM tbl_major";
$result = dbQuery($sql);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left" colspan="3">Curriculum</th>
				</tr>
  <tr bgcolor="#bbbbba"> 
   <td>
   First Year
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y1S1">First Semister</a>
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y1S2">Second Semister</a>
   </td>
  </tr>  
  <tr bgcolor="#e6e4e4"> 
   <td>
   Second Year
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y2S1">First Semister</a>
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y2S2">Second Semister</a>
   </td>
  </tr>
   <td>
   Third Year
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y3S1">First Semister</a>
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y3S2">Second Semister</a>
   </td>
  </tr>  
  <tr bgcolor="#e6e4e4"> 
   <td>
   Fourth Year
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y4S1">First Semister</a>
   <td>
   <a href="index.php?view=addSubject&MajorId=<?php echo $MajorId;?>&cur=<?php echo $MajorId;?>Y4S2">Second Semister</a>
   </td>
  </tr>



  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="center">
       <a href='#' class="more" onclick="addMajor()">add Major</a>
   
   </td>
  </tr>
 </table>
