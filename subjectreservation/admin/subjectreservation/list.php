<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$code = (isset($_GET['code']) && $_GET['code'] > '') ? $_GET['code'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';

$sql = "SELECT c_id, c_code, c_subjcode, c_schedstart, c_schedend, c_schedday, c_room, c_section, c_max
        FROM tbl_class where c_subjcode = '$code'";
$result = dbQuery($sql);

?> 

<h2>Search: <?php echo $code;?></h2>
<table>

  <? if ($cur=='')
  
  {
  ?>
    <input type="button" value="Auto Evaluate" onclick="window.location.href='index.php?cur=yes';" name="Auto Evaluate" />
    <?php } else if ($cur=='yes') {?>
  
  
<form  action="index.php?view=get" name="lkgnklgfndlk" method="get">
	<input type="hidden" name="view" value="list" />
   <select name="cur" class="box">
     <option value=""> - Select Year / Sem - </option>
     <option value="<?php echo $majorId;?>Y1S1">First Year/First Sem</option>
     <option value="<?php echo $majorId;?>Y1S2">First Year/Second Sem</option>
     <option value="<?php echo $majorId;?>Y2S1">Second Year/First Sem</option>
     <option value="<?php echo $majorId;?>Y2S2">Second Year/Second Sem</option>
     <option value="<?php echo $majorId;?>Y3S1">Third Year/First Sem</option>
     <option value="<?php echo $majorId;?>Y3S2">Third Year/Second Sem</option>
     <option value="<?php echo $majorId;?>Y4S1">Fourth Year/First Sem</option>
     <option value="<?php echo $majorId;?>Y4S2">Fourth Year/Second Sem</option>
   </select> 
  <input type="submit" value="submit" name="submit" />
<?php }else {?>
  <input type="button" value="done" onclick="window.location.href='process.php?action=autoevaluate&cur=<?php echo $cur;?>&student=<?php echo $session;?>&teacher=autoevaluate';" name="Auto Evaluate" />
  <?php }?>
</form>
         
         

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser"  class="jNice">

    				<table border="0" width="621">
				<tr>
					<th align="left"><h4>Code</th>
					<th align="left"><h4>Description</th>
					<th align="left"><h4>Schedule</th>
					<th align="left"><h4>Room</th>
					<th align="left"><h4>Section</th>
					<th align="left"><h4>Pre-Requisite</th>
					<th align="left"><h4>Max</th>
					<th align="left"><h4>In</th>
					<th align="left"><h4>Reserve</th>
				</tr>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	
	$countIn = mysql_num_rows(mysql_query("SELECT sr_code FROM tbl_subjectreservation where sr_code='$c_code'"));
	
		//check class conflict	
	$checkclass= mysql_num_rows(mysql_query("SELECT sr_code FROM tbl_subjectreservation where sr_subjcode='$c_subjcode' and sr_student='$session' or sr_schedstart='$c_schedstart'"));
	
	if ($checkclass == 1)
	{
	$fontcolor = 'red';
	$reservedname = '';
	}
	else
	{
	$reservedname = 'Reserve';
	$fontcolor = 'black';
	}
	
	
		if ($i%2) {
			$class = '#bbbbba';
		} else {
			$class = '#e6e4e4';
		}
	
	
	
		$sql1 = "SELECT s_desc, s_prereq
        FROM tbl_subject where s_code='$c_subjcode'";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$desc= $show['s_desc'];
		$prereq= $show['s_prereq'];
		
		
	
	
	$i += 1;
	
?>
  <tr bgcolor="<?php echo $class;?>"> 
   <td><font color='<?php echo $fontcolor;?>'><font color='<?php echo $fontcolor;?>'><?php echo $c_code; ?></b>
   <td><font color='<?php echo $fontcolor;?>'>
   <?php echo $desc;?>
   <td><font color='<?php echo $fontcolor;?>'>
   <?php echo $c_schedstart;?> - <br><?php echo $c_schedend;?> <br>(<?php echo $c_schedday;?>)
   <td><font color='<?php echo $fontcolor;?>'>
   <?php echo $c_room;?>
   <td><font color='<?php echo $fontcolor;?>'>
   <?php echo $c_section;?>
   <td><font color='<?php echo $fontcolor;?>'>
   <?php echo $prereq;?>
   <td><font color='<?php echo $fontcolor;?>'>
   <?php echo $c_max;?>
   <td><font color='<?php echo $fontcolor;?>'>
   <?php echo $countIn;?>
   <td><font color='<?php echo $fontcolor;?>'>
   <a href="process.php?action=add&code=<?php echo $c_code; ?>&subjcode=<?php echo $c_subjcode; ?>&student=<?php echo $session;?>&schedstart=<?php echo $c_schedstart;?>&schedday=<?php echo $c_schedday;?>"><?php echo $reservedname?></a>

   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>
