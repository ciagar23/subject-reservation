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



<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';
$subj = (isset($_GET['subj']) && $_GET['subj'] > '') ? $_GET['subj'] : '';

$sql = "SELECT c_id, c_code, c_subjcode, c_schedstart, c_schedend, c_schedday, c_room, c_section 
        FROM tbl_class where c_subjcode like '%$subj%'";
$result = dbQuery($sql);
$count=mysql_num_rows($result);
?> 

<form  action="index.php?view=get" name="lkgnklgfndlk" method="get">
	<input type="hidden" name="view" value="list" />
  <?php

$sqls = "SELECT s_id, s_code
        FROM tbl_subject";
$results = dbQuery($sqls);

?> 
<select name="subj" >

<?php
while($rows = dbFetchAssoc($results)) {
	extract($rows);

	$i += 1;
?>
   <option><?php echo $s_code; ?></option>

<?php
} // end while

?>
</select>
  <input type="submit" value="submit" name="submit" />
</form>

  

<table>
           
<form action="process.php?action=add" method="post"  name="frmEvaluate" id="frmEvaluate">

<input type="hidden" name="counter" value="<?php echo $count;?>"  />



    				<table border="0" width="621">
				<? if ($subj!=''){?>
				<tr>
					<th align="left"><input type="checkbox" id="selectall"/>
					<th align="left"><h4>Code</th>
					<th align="left"><h4>Description</th>
					<th align="left"><h4>Schedule</th>
					<th align="left"><h4>Room</th>
					<th align="left"><h4>Section</th>
					<th align="left"><h4>Pre-Requisite</th>
				</tr>
				</tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
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
	
	
	
	$checkEvaluation = mysql_num_rows(mysql_query("SELECT * FROM tbl_assignteacher where a_classcode='$c_code' and a_teacher='$teacher'"));
	$i += 1;
?> <?php if($checkEvaluation==0) {?>

<input type="hidden" name="subjcode" value="<?php echo $c_subjcode;?>"  />
  <tr bgcolor="<?php echo $class;?>"> 
   <td>
  
   <input name="checkbox[]" class="case" type="checkbox"  value="<?php echo $c_code; ?>">
    <td>
   <?php echo $c_code;?>
    <td>
   <?php echo $desc;?>
   <td>
   <?php echo $c_schedstart;?> - <br><?php echo $c_schedend;?> <br>(<?php echo $c_schedday;?>)
   <td>
   <?php echo $c_room;?>
   <td>
   <?php echo $c_section;?>
   <td>
   <?php echo $prereq;?>
  </tr>
   <?php } else { echo '&nbsp';}?>
   
<?php
} // end while

?>
  <tr> 
   <td colspan="5">
  <input name="btnAddMajor" type="submit" id="btnAddMajor" value="Assign" class="form-add"> </td>
  </tr> <?} else {}?>
 </table>

 </form>
