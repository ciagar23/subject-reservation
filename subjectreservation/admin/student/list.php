<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$rowsPerPage = 15;
$queryString = '';
$sql = "SELECT p_student, p_status
        FROM tbl_payment where p_student like '%$search%' and p_status='yes'
		ORDER BY p_status";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?> 
      
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h3>User Name</th>
					<th align="left"><h3>Course</th>
					<th align="left"&nbsp;</th>
				</tr>

<?php
if (dbNumRows($result) > 0) {
	$i = 0;
	
while($row = dbFetchAssoc($result)) {
	extract($row);
	if ($i%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	}
	
	$result2 = mysql_query("SELECT * FROM tbl_user where user_name='$p_student'");
		$show2 = mysql_fetch_array($result2);	
		$sfname= $show2['user_fname'];
		$slname= $show2['user_lname'];
		$course= $show2['user_course'];
	
	$i += 1;
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><?php echo $sfname.' '.$slname; ?></b>
   <td><?php echo $course; ?></b>
   </td>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <td>  <tr> 
   <td colspan="5" align="center">
   <?php 
echo $pagingLink;
}
   ?></td>
  </tr   
   </td>
  </tr>
 </table>
