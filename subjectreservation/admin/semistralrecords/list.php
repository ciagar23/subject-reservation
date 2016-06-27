<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$student = (isset($_GET['student']) && $_GET['student'] > '') ? $_GET['student'] : '';
		
		//get name
		$show = mysql_fetch_array(mysql_query("SELECT * FROM tbl_user where user_name='$student'"));	
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];
		$major= $show['user_course'];
		
		//get major id
		$show2 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_major where m_code='$major'"));	
		$mId= $show2['m_id'];
		$mDesc= $show2['m_desc'];
		

		

?> 
<table align="center">
<tr>
<td align="center"><font color="#009900" size="+1" face="Arial, Helvetica, sans-serif"><h1><?php echo $fname.' '.$lname;?></h1>
<tr>
<td align="center"><?php echo $major;?> : <?php echo $mDesc;?>
           
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621" align="center">
                    
				<tr>
					<th align="left"><h4>Code</th>
					<th align="left"><h4>Description</th>
					<th align="left"><h4>Lec</th>
					<th align="left"><h4>Lab</th>
					<th align="left"><h4>Unit</th>
					<th align="left"><h4>Pre-Requisite</th>
					<th align="left"><h4>Grades</th>
				</tr>
                
              
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3> First Year First Semister

<?php
$year1 = $mId.'Y1S1';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year1'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades= $showy['g_grades'];
   
   if ($grades <= 74 ) {
    echo '<font color=red><b>'.$grades;
    }
    else
    {
    echo '<font color=black><b>'.$grades;
    }
	?>
    

  </tr>
<?php
} // end while

?>

<tr><td>&nbsp;
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3>First Year Second Semister

<?php
$year2 = $mId.'Y1S2';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year2'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy2 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades2= $showy2['g_grades'];
   
    if ($grades2 <= 74 ) {
    echo '<font color=red><b>'.$grades2;
    }
    else
    {
    echo '<font color=black><b>'.$grades2;
    }
    ?>

  </tr>
<?php
} // end while

?>
<tr><td>&nbsp;
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3>Second Year First Semister

<?php
$year3 = $mId.'Y2S1';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year3'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy3 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades3= $showy3['g_grades'];
   
     if ($grades3 <= 74 ) {
    echo '<font color=red><b>'.$grades3;
    }
    else
    {
    echo '<font color=black><b>'.$grades3;
    }?>

  </tr>
<?php
} // end while

?>
<tr><td>&nbsp;
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3>Second Year Second Semister

<?php
$year4 = $mId.'Y2S2';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year4'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy8 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades8= $showy8['g_grades'];
   
     if ($grades8 <= 74 ) {
    echo '<font color=red><b>'.$grades8;
    }
    else
    {
    echo '<font color=black><b>'.$grades8;
    }?>

  </tr>
<?php
} // end while

?>
<tr><td>&nbsp;
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3>Third Year First Semister

<?php
$year5 = $mId.'Y3S1';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year5'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy4 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades4= $showy4['g_grades'];
   
     if ($grades4 <= 74 ) {
    echo '<font color=red><b>'.$grades4;
    }
    else
    {
    echo '<font color=black><b>'.$grades4;
    }?>

  </tr>
<?php
} // end while

?>
<tr><td>&nbsp;
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3>Third Year Second Semister

<?php
$year6 = $mId.'Y3S2';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year6'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy5 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades5= $showy5['g_grades'];
   
    if ($grades5 <= 74 ) {
    echo '<font color=red><b>'.$grades5;
    }
    else
    {
    echo '<font color=black><b>'.$grades5;
    }?>

  </tr>
<?php
} // end while

?>
<tr><td>&nbsp;
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3>Fourth Year First Semister

<?php
$year7 = $mId.'Y4S1';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year7'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy6 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades6= $showy6['g_grades'];
   
    if ($grades6 <= 74 ) {
    echo '<font color=red><b>'.$grades6;
    }
    else
    {
    echo '<font color=black><b>'.$grades6;
    }?>

  </tr>
<?php
} // end while

?>
<tr><td>&nbsp;
<tr><td colspan="6"><font color="#000000" face="Arial, Helvetica, sans-serif"><h3>Fourth Year Second Semister

<?php
$year8 = $mId.'Y4S2';
$result = dbQuery("SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear FROM tbl_subject where s_semyear='$year8'");
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
   <td>
   <?php echo $s_code;?></b>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   <?php echo $s_prereq;?>
   <td>
   <?php
   	//get major id
		$showy7 = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_code'"));	
		$grades7= $showy7['g_grades'];
   
    if ($grades7 <= 74 ) {
    echo '<font color=red><b>'.$grades7;
    }
    else
    {
    echo '<font color=black><b>'.$grades7;
    }?>

  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
