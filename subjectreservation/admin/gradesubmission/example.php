<?php
$file = (isset($_GET['file']) && $_GET['file'] != '') ? $_GET['file'] : '';
ini_set("display_errors",1);
error_reporting(E_ALL);
require_once 'excel_reader2.php';
$xls = new Spreadsheet_Excel_Reader("upload/tmp/".$file);
?>
<html>
<head>

</head>
<body>


<table width="100%">
	<tr>
		<th>Faculty </td>
		<th><?php echo $xls->val(1,2); ?>&nbsp </td>
		<th>&nbsp </td>

	</tr>
	<tr>
		<th>Teacher's ID&nbsp </td>
		<th><?php echo $xls->val(2,2);
		$teacher = $xls->val(2,2);  ?>&nbsp </td>
		<th>&nbsp </td>

	</tr>
	<tr>
		<th>Subject:&nbsp </td>
		<th><?php echo $xls->val(3,2);  ?>&nbsp </td>
		<th>&nbsp </td>

	</tr>
	<tr>
		<th>Sub Code:&nbsp </td>
		<th><?php echo $xls->val(4,2);
		$subject = $xls->val(4,2);  ?>&nbsp </td>
		<th>&nbsp </td>

	</tr>
	<tr>
		<th colspan="3">&nbsp </td>

	</tr>
	<tr>
		<th colspan="3" align="center"> STUDENT </th>

	</tr>
	<tr bgcolor="#990000">
		<th><font color="#FFFFFF">ID Number:&nbsp </td>
		<th><font color="#FFFFFF">Name:&nbsp </td>
		<th><font color="#FFFFFF">Grades:&nbsp </td>

	</tr>
<? for ($row=8;$row<=$xls->rowcount();$row++) {	
	if ($row%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	} ?><? $row1=$xls->val($row,2); $row2=$xls->val($row,3); $row3=$xls->val($row,4); ?>
	<tr bgcolor="<?php echo $class;?>">
		<td><?php echo $row1;  ?>&nbsp </td>
		<td><?php echo $row2;  ?>&nbsp </td>
		<td><?php echo $row3;  ?>&nbsp </td>

<?php
		
		$sql   = "INSERT INTO tbl_grades (g_student, g_grades, g_teacher, g_subject, g_datesubmitted)
	          VALUES ('$row1', '$row3', '$teacher', '$subject', NOW())";

	$result = dbQuery($sql);
		
		
		?>

	</tr>
<? } ?>
</table>

</body>
</html>
