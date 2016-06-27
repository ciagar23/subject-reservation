<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT p_student, p_status
        FROM tbl_payment where p_student like '%$search%' and p_status='yes'
		ORDER BY p_status";
$result = dbQuery($sql);

?> 
<table>
   
<tr>
<td>
<form method="get" name="search">
search <input type="text" name="search"><input type="submit" value="search"> 
</form>          
           
 <tr>      
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h3>User Name</th>
					<th align="left"><h3>Untag</th>
					<th align="left"&nbsp;</th>
				</tr>

<?php
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
	
	$i += 1;
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><?php echo $sfname.' '.$slname; ?></b>
   <td><a href="process.php?action=untag&username=<?php echo $p_student;?>">Untag</a></td>
   </td>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>   
   </td>
  </tr>
 </table>
 </table>
