<?php
if (!defined('WEB_ROOT')) {
	exit;
}



$level = (isset($_GET['level']) && $_GET['level'] != '') ? $_GET['level'] : '';

$sql = "SELECT *
        FROM tbl_onlinepayment where yr_lvl='$level'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$reqPayment= $show['req_payment'];

?> 
<!-- start id-form -->
 <script type="text/javascript">
   <!--
   function MM_jumpMenu(targ,selObj,restore){
   eval(targ+".location='index.php?level="+selObj.options[selObj.selectedIndex].value+"'");
   if (restore) selObj.selectedIndex=0; } //-->
   </script>
   


		<table cellpadding="5" cellspacing="5">

  
  <tr> 
   <th >Select Year: </th>
   <td>

   <form name="form" id="form">
   <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
     <option value=""> - Select Year - </option>
     <option>1st Year</option>
     <option>2nd Year</option>
     <option>3rd Year</option>
     <option>4th Year</option>
   </select>
   </form>
   </td>
   
   <td><h5>You are required to pay:</h5> <font size="+2" color="#00CC00"><?php echo $reqPayment;?></u></td>

<form action="process.php?action=pay" method="post" enctype="multipart/form-data" name="frmAddUser">  
 
 <input name="student" type="hidden" value="<?php echo $session;?>" >
 <input name="amount" type="hidden" value="<?php echo $reqPayment;?>" >
    
  <tr> 
  <th>Select Card:
   <td><select name='cardType'> 
   <option value=""> - Select Card -</option>  
   <option>Master Card</option>
   <option>Visa</option>
   </select>
   </td>
  </th>
   <td> <img src='<?php echo WEB_ROOT;?>cards.jpg'>
  </td>
  </tr>    
  <tr> 
   <th >Card Number: </th>
   <td> <input name="cNum" onKeyup="checkNumber(this);" type="text" class="box" value="" size="20" maxlength="20"></td>
          
  </td>
  </tr>    
  <tr> 
   <th >Validation Number: </th>
   <td> <input name="vNum" onKeyup="checkNumber(this);" type="text" class="box" value="" size="5" maxlength="3"></td>
   <td> <img src="<?php echo WEB_ROOT;?>ccv.gif">
          
  </td>
  </tr>    
  <tr> 
   <th >Expiration Date: </th>
   <td>
   <select name='expMonth'> 
   <option value=""> - Month -  </option>
   <option>01</option>
   <option>02</option>
   <option>03</option>
   <option>04</option>
   <option>05</option>
   <option>06</option>
   <option>07</option>
   <option>08</option>
   <option>09</option>
   <option>10</option>
   <option>11</option>
   <option>12</option>
   </select>
   <select name='expYear'> 
   <option value=""> - Year -  </option>
   <option>2015</option>
   <option>2016</option>
   <option>2017</option>
   <option>2018</option>
   <option>2019</option>
   <option>2020</option>
   <option>2021</option>
   <option>2022</option>
   </select>
   </td>
          
  
  </tr>    
  <tr> 
   <th >Card Holder: </th>
   <td><input name="fName" value="First Name" onblur="if (this.value=='') { this.value='First Name'; }" onfocus="if (this.value=='First Name') { this.value=''; }" type="text" class="box" value="" size="20" maxlength="20"></td>
   <td><input name="lName" value="Last Name" onblur="if (this.value=='') { this.value='Last Name'; }" onfocus="if (this.value=='Last Name') { this.value=''; }" type="text" class="box" value="" size="20" maxlength="20"></td>
  </tr>
  
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
Read the <a href="terms and condition.php" target="_blank">Terms and Conditions</a>.
 <div align="center"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Submit Payment" onClick="checkAddUserForm();" class="form-add"> 
 </div>
</form>