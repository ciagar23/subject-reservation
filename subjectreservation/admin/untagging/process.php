<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
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
		
	case 'untag' :
		untag();
		break;
		
	case 'tag' :
		tag();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addUser()
{
    $FName = $_POST['txtFName'];
    $LName = $_POST['txtLName'];
    $userName = $_POST['txtUserName'];
    $Password = $_POST['txtPassword'];
    $Position = $_POST['txtPosition'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken
	$sql = "SELECT user_name
	        FROM tbl_user
			WHERE user_name = '$userName'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('Username already taken. Choose another User Name'));	
	} else {			
		$sql   = "INSERT INTO tbl_user (user_fname,user_lname,user_name, user_password, user_position, user_regdate)
		          VALUES ('$FName','$LName','$userName', PASSWORD('$Password'),'$Position', NOW())";
	
		dbQuery($sql);
		header('Location: index.php?success=' . urlencode('You have Successfully Added a New User'));	
	}
}

/*
	Modify a user
*/
function untag()
{
    $userName = $_GET['username'];
	
	$sql   = "UPDATE tbl_payment 
	          SET p_status = 'no'
			  
			  WHERE p_student = '$userName'";

	dbQuery($sql);
	header('Location: index.php?success=You have Successfully untagged this Student');

}/*
	Modify a user
*/
function tag()
{
    $userName = $_GET['username'];
	
	$sql   = "UPDATE tbl_payment 
	          SET p_status = 'yes'
			  
			  WHERE p_student = '$userName'";

	dbQuery($sql);
	header('Location: ../index.php?success=You have Successfully Finalized it');

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
	header('Location: index.php?view=changepassword&alert=' . urlencode('You have Successfully Modified This Student'));
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