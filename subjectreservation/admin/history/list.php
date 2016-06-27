<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$rowsPerPage = 20;
$queryString = '';
$sql = "SELECT h_id,h_user,h_date,h_history FROM tbl_history";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h3>User</th>
					<th align="left"><h3>Date</th>
					<th align="left"><h3>History</th>
					
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
	
	$i += 1;
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><?php echo $h_user; ?>  
   <td><?php echo $h_date; ?>  
   <td><?php echo $h_history; ?> 
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5" align="center">
   <?php 
echo $pagingLink;
}
   ?></td>
  </tr>
 </table>
