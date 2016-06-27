<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<form action="processProduct.php?action=addProduct" method="post" enctype="multipart/form-data">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
   <td class="label">Upload Excel File</td>
   <td class="content"> <input name="fleImage" type="file" id="fleImage" class="box"> 
    </td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Product" onClick="checkAddProductForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
