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
    $userName = $_POST['txtUserName'];
    $Password = $_POST['txtPassword'];
    $Position = $_POST['txtPosition'];
    $Age = $_POST['txtAge'];
	$Gender = $_POST['txtGender'];
	$DateofBirth = $_POST['txtDateofBirth'];
	$MothersMaidenName = $_POST['txtMothersMaidenName'];
	$FathersName = $_POST['txtFathersName'];
	$StudentStatus = $_POST['txtStudentStatus'];
	$Major = $_POST['txtMajor'];
	$EmailAddress = $_POST['txtEmailAddress'];
	$MTelcell = $_POST['txtMTelcell'];
	$FTelcell = $_POST['txtFTelcell'];
	$StreetCityAddress = $_POST['txtStreetCityAddress'];
	$year = $_POST['txtYear'];
	
	// check if the username is taken
	$sql = "SELECT user_name
	        FROM tbl_user
			WHERE user_name = '$userName'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('Username already taken. Choose another User Name'));	
	} else {			
		$sql   = "INSERT INTO tbl_user (user_fname,user_lname,user_name, user_password, user_position, user_regdate,user_course, user_StudentStatus, user_Age, user_Gender, user_DateofBirth, user_EmailAddress, user_StreetCityAddress, user_MothersMaidenName, user_MTelcell, user_FathersName, user_FTelcell, user_year)
		          VALUES ('$FName','$LName','$userName', PASSWORD('$Password'),'$Position', NOW() ,'$Major' ,'$StudentStatus' ,'$Age' ,'$Gender' ,'$DateofBirth' ,'$EmailAddress' ,'$StreetCityAddress' ,'$MothersMaidenName' , '$MTelcell' , '$FathersName', '$FTelcell', '$year' )";
	
		dbQuery($sql);
		header('Location: ../user/index.php?success=' . urlencode('You have Successfully Added a New User'));	
	}
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
	$Age = $_POST['txtAge'];
	$Gender = $_POST['txtGender'];
	$DateofBirth = $_POST['txtDateofBirth'];
	$MothersMaidenName = $_POST['txtMothersMaidenName'];
	$FathersName = $_POST['txtFathersName'];
	$StudentStatus = $_POST['txtStudentStatus'];
	$Major = $_POST['txtMajor'];
	$EmailAddress = $_POST['txtEmailAddress'];
	$MTelcell = $_POST['txtMTelcell'];
	$FTelcell = $_POST['txtFTelcell'];
	$StreetCityAddress = $_POST['txtStreetCityAddress'];
	
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$Password'), user_fname='$FName', user_lname='$LName', user_position='$Position', user_Age='$Age', user_Gender='$Gender', user_DateofBirth='$DateofBirth', user_MothersMaidenName='$MothersMaidenName', user_MTelcell='$MTelcell', user_FathersName='$FathersName', user_FTelcell='$FTelcell', user_StreetCityAddress='$StreetCityAddress'
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