<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$datenow = DATE("m-d-Y");
$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "Select e_student, e_date FROM tbl_evaluatedstudent where e_evaluator='$session' and e_date='$datenow'";
$result = dbQuery($sql);
$count = mysql_num_rows($result);

?> 
<table>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<td colspan="2">Total Evaluated students Today: <?php echo $count;?></td>
				</tr>
				<tr>
					<th align="left"><h3>Evaluated Student</th>
					<th align="left"><h3>Major</th>
				</tr>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	if ($i%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	}
	
	extract(dbFetchAssoc(dbQuery("SELECT user_id, user_course, user_name, user_regdate, user_last_login, user_fname, user_lname, user_position
        FROM tbl_user where user_name ='$e_student'
		ORDER BY user_fname")));
	
	
	$i += 1;
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><?php echo $user_fname; ?> <?php echo $user_lname; ?></b>
   <td><?php echo $user_course; ?></td>
   <td>
   
   </td>
  </tr>
<?php
} // end while

?>

 </table>
