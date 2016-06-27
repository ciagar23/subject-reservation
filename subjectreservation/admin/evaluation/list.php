<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/jquery.min.js"></script>
<SCRIPT language="javascript">
$(function(){
 
    // add multiple select / deselect functionality
    $("#selectall").click(function () {
          $('.case').attr('checked', this.checked);
    });
    $(".case").click(function(){
 
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    });
});
</SCRIPT>

<style type="text/css">
.tooltip {
  border-bottom: 1px dotted #000000;
  color: #000000; outline: none;
  cursor: help; text-decoration: none;
  position: relative;
}
.tooltip span {
  margin-left: -999em;
  position: absolute;
}


.tooltip:hover span {
  font-family: Calibri, Tahoma, Geneva, sans-serif;
  position: absolute;
  left: 1em;
  top: 2em;
  z-index: 99;
  margin-left: 0;
  width: 200px;
}
.tooltip:hover img {
  border: 0;
  margin: -10px 0 0 -55px;
  float: left;
  position: absolute;
}
.tooltip:hover em {
  font-family: Candara, Tahoma, Geneva, sans-serif;
  font-size: 1.2em;
  font-weight: bold;
  display: block;
  padding: 0.2em 0 0.6em 0;
}
.classic { padding: 0.8em 1em; }
.custom { padding: 0.5em 0.8em 0.8em 2em; }
* html a:hover { background: transparent; }

.classic { background: #FFFFAA; border: 1px solid #FFAD33; }
.critical { background: #FFCCAA; border: 1px solid #FF3334; }
.help { background: #9FDAEE; border: 1px solid #2BB0D7; }
.info { background: #9FDAEE; border: 1px solid #2BB0D7; }
.warning { background: #FFFFAA; border: 1px solid #FFAD33; }
</style>




<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';
$autoevaluate = (isset($_GET['autoevaluate']) && $_GET['autoevaluate'] > '') ? $_GET['autoevaluate'] : '';
$datenow = date("m-d-Y");


$sql = "SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear
        FROM tbl_subject where s_semyear like '%$cur%'";
$result = dbQuery($sql);
$count=mysql_num_rows($result);
?> 

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
  <? if ($cur!=''){?>
  <input type="button" value="Auto Evaluate" onclick="window.location.href='processEvaluation.php?action=autoevaluate&cur=<?php echo $cur;?>&student=<?php echo $student;?>&teacher=<?php echo $session;?>';" name="Auto Evaluate" />
  <?php }?>
</form>


<table>
           
<form action="processEvaluation.php?action=add" method="post"  name="frmEvaluate" id="frmEvaluate">

<input type="hidden" name="counter" value="<?php echo $count;?>"  />
<input type="hidden" name="evaluator" value="<?php echo $session;?>"  />



    				<table border="0" width="621">
				<? if ($cur!=''){?>
				<tr>
					<th align="left"><input type="checkbox" id="selectall"/>
					<th align="left">Code</th>
					<th align="left">Description</th>
					<th align="left">Lec</th>
					<th align="left">Lab</th>
					<th align="left">Unit</th>
					<th align="left">Pre-Requisite</th>

				</tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = '#bbbbba';
	} else {
		$class = '#e6e4e4';
	}
	$checkEvaluation = mysql_num_rows(mysql_query("SELECT * FROM tbl_evaluation where e_code='$s_code' and e_student='$student'"));
	
   	//get major id
		$showy = mysql_fetch_array(mysql_query("SELECT * FROM tbl_grades where g_student='$student' and g_subject='$s_prereq'"));	
		$grades= $showy['g_grades'];

  
	
	$i += 1;
?> <?php if($checkEvaluation==0) {?>

  <tr bgcolor="<?php echo $class;?>"> 
   <td>
  
   <input name="checkbox[]" class="case" type="checkbox"  value="<?php echo $s_code; ?>">
   <td>
   <?php echo $s_code;?>
   <td>
   <?php echo $s_desc;?>
   <td>
   <?php echo $s_lec;?>
   <td>
   <?php echo $s_lab;?>
   <td>
   <?php echo $s_unit;?>
   <td>
   
<input type="hidden" name="pre" value="<?php echo $s_prereq;?>"  />
   <a class="tooltip" href="#"> <font color="#FF0000">
  <?php echo $s_prereq;?></font><span class="custom critical"><img src="logo.png" alt="Error" height="50" width="50" /><em><?php echo $s_prereq;?></em><?php echo $s_desc;?><br><div align ="center"><b> Grade: <?php echo $grades;?></b></div><br><div align ="center"><b> Status: <?php 
  
  if ($grades!='') 
  {
  if ($grades >=75) 
  {
  echo 'Passed';
  }
  else 
  { 
  echo 'Failed';
  }
  }
   else 
   {
   echo 'not yet taken';
   }
   
   
   ?></b></div></span></a>

  </tr>
   <?php } else { echo '&nbsp';}?>
   
<?php
} // end while

?>
  <tr> 
   <td colspan="5">
  <input name="btnAddMajor" type="submit" id="btnAddMajor" value="Evaluate" class="form-add"> </td>
  </tr> <?} else {}?>
 </table>

 </form>
