<?php

$sqls = "SELECT s_id, s_code
        FROM tbl_subject";
$results = dbQuery($sqls);

?> 
<select>

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
