
<?php
$datenow = DATE("m-d-Y");
$totalnum = mysql_num_rows(mysql_query("Select * FROM tbl_evaluatedstudent where e_evaluator='$session'"));
$daynum = mysql_num_rows(mysql_query("Select * FROM tbl_evaluatedstudent WHERE e_date='$datenow' and  e_evaluator='$session'"));

?>

<html>
<div align="center">
<h1><font color = 'red'>CSAB Online Subjects Registration System </h1></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp

<br><br>
<h2>&nbsp;&nbsp;&nbsp;&nbsp;This online system is designed to computerize the Evaluation and Registration

of student's subject in the area of Computer Studies.</h2>

<br><br><br><br><br>

<?php if ($position=="AREA HEAD"){
?>
<Table align="left">

<TR> 
<TD><h3>No. of Students Evaluated today : <font color = 'red'><?php echo $daynum;?></font>

<TR>
<TD><h3>Total No. of Evaluated Students : <font color = 'red'><?php echo $totalnum;?></font>

</TABLE>
<?PHP }
 else {}
?>


</div>