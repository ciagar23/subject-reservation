<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'pay' :
		pay();
		break;
		
	case 'modify' :
		modifyUser();
		break;
		
	case 'changepass' :
		changepass();
		break;
		
	case 'delete' :
		deleteUser();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function pay()
{
	$Student = $_POST['student'];
    $CNumber = $_POST['cNum'];
	$amount = $_POST['amount'];
	$cardType = $_POST['cardType'];
	$VNum = $_POST['vNum'];
	$ExpMonth = $_POST['expMonth'];
	$ExpYear = $_POST['expYear'];
	$FirstName = $_POST['fName'];
	$LastName = $_POST['lName'];
  			
		$sql   = "INSERT INTO tbl_payment (p_student, p_date, p_cNum, p_amount, p_cType, p_cValidNum , p_expMonth , p_expYear , p_chFname , p_chLname)
		          VALUES ('$Student' , NOW(), '$CNumber' , '$amount' , '$cardType' , '$VNum' , '$ExpMonth' , '$ExpYear' , '$FirstName' , '$LastName')";
	
		dbQuery($sql);

	dbQuery("UPDATE tbl_subjectreservation 
	          SET sr_status =1 WHERE sr_student = '$Student'");
		header('Location: index.php?view=tc');	
	
}

/*
	Modify a user
*/
function modifyUser()
{
	$userId   = (int)$_POST['hidUserId'];	
	$FName = $_POST['txtFName'];
    $LName = $_POST['txtLName'];
    $userName = $_POST['txtUserName'];
    $Password = $_POST['txtPassword'];
    $Position = $_POST['txtPosition'];
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$Password'), user_fname='$FName', user_lname='$LName', user_position='$Position'
			  WHERE user_id = $userId";

	dbQuery($sql);
	header('Location: index.php?success=You have Successfully Modified this User');

}/*
	Modify a user
*/
function changepass()
{
	$session = $_SESSION["username"];	
    $Password = $_POST['txtPassword'];
    $Password2 = $_POST['txtPassword2'];
	
	if ($Password != $Password2)
	{
	header('Location: index.php?view=changepassword&alert=' . urlencode('PassWord Do not Match'));
	}
	else
	{
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$Password')
			  WHERE user_name = '$session'";

	dbQuery($sql);
	header('Location: index.php?view=changepassword&alert=' . urlencode('You have Successfully Modified this User'));
}
}

/*
	Remove a user
*/
function deleteUser()
{
	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_user 
	        WHERE user_id = $userId";
	dbQuery($sql);
	
	header('Location: index.php?success=You Have Successfully Deleted this User');
}
?>