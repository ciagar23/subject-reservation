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
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addUser()
{
    $FName = $_POST['txtFName'];
    $LName = $_POST['txtLName'];
    $Course = $_POST['txtCourse'];
    $Year = $_POST['txtYear'];
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
	
	$checkCourse = dbQuery("SELECT m_code FROM tbl_major WHERE m_code = '$Course'");
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('Username already taken. Choose another User Name'));	
	} else if (dbNumRows($checkCourse) == 0) {
		header('Location: index.php?view=add&error=' . urlencode('Course Code not Found in the Database'));	
	} else {			
		$sql   = "INSERT INTO tbl_user (user_fname,user_lname,user_name, user_password, user_position, user_regdate, user_course, user_year)
		          VALUES ('$FName','$LName','$userName', PASSWORD('$Password'),'$Position', NOW(), '$Course', '$Year')";
	
		dbQuery($sql);
		header('Location: index.php?success=' . urlencode('You have Successfully Added a New User'));	
	}
}

/*
	Modify a user
*/
function modifyUser()
{
	$userId   = (int)$_POST['hidUserId'];	
    $Course = $_POST['txtCourse'];
    $Year = $_POST['txtYear'];
	$FName = $_POST['txtFName'];
    $LName = $_POST['txtLName'];
    $userName = $_POST['txtUserName'];
    $Password = $_POST['txtPassword'];
    $Position = $_POST['txtPosition'];
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$Password'), user_fname='$FName', user_lname='$LName', user_position='$Position', user_year='$Year', user_course='$Course'
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