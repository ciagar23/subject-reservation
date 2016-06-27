<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		add();
		break;
		
		
    case 'delete' :
		delete();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main Major page
		header('Location: index.php');
}


function add()
{
    
    $SubjCode = $_POST['SubjCode'];
	$ClassCode = $_POST['ClassCode'];
	$txtFrom = $_POST['txtFrom'];
	$txtTo = $_POST['txtTo'];
	$txtM = isset($_POST['txtM']) ? $_POST['txtM'] : '';
	$txtT = isset($_POST['txtT']) ? $_POST['txtT'] : '';
	$txtW = isset($_POST['txtW']) ? $_POST['txtW'] : '';
	$txtTh = isset($_POST['txtTh']) ? $_POST['txtTh'] : '';
	$txtF = isset($_POST['txtF']) ? $_POST['txtF'] : '';
	$txtS = isset($_POST['txtS']) ? $_POST['txtS'] : '';
	$Room = $_POST['Room'];
	$maxStud = $_POST['maxStud'];
	$ClassSec = $_POST['ClassSec'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the Majorname is taken
	$subjectCheck = dbQuery("SELECT s_code FROM tbl_subject WHERE s_code = '$SubjCode'");
	$classCheck = dbQuery("SELECT c_code FROM tbl_class WHERE c_code = '$ClassCode'");
	
	if (dbNumRows($subjectCheck) == 0) {
		header('Location: index.php?view=add&error=' . urlencode('This Subject Code DOES NOT EXIST<br>Please Check the correct spelling of your SUBJECT CODE'));	
	} else 	if (dbNumRows($classCheck) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('This Class Code ALREADY EXIST'));	
	} else {			
		$sql   = "INSERT INTO tbl_class (c_code, c_subjcode, c_schedstart, c_schedend, c_schedday, c_room, c_section, c_max)
		          VALUES ('$ClassCode', '$SubjCode', '$txtFrom', '$txtTo', '$txtM $txtT $txtW $txtTh $txtF $txtS', '$Room', '$ClassSec', '$maxStud')";
	
		dbQuery($sql);
		header('Location: index.php?success=' . urlencode('You have Successfully Added a Class'));	
	}
}


function addSubject()
{
    $Code = $_POST[''];
    $Desc = $_POST['txtDesc'];
    $Lec = $_POST['txtLec'];
    $Lab = $_POST['txtLab'];
    $Unit = $_POST['txtUnit'];
    $Prereq = $_POST['txtPrereq'];
    $MajorId = $_POST['txtMajorId'];
    $cur = $_POST['txtCur'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the Majorname is taken
	$sql = "SELECT s_code
	        FROM tbl_subject
			WHERE s_code = '$Code' and s_semyear = '$cur'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ' . $_SERVER['HTTP_REFERER']. '&cur='.$cur.'&error=This Subject Code Already Exist');	
	} else {			
		$sql   = "INSERT INTO tbl_subject (s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear)
		          VALUES ('$Code','$Desc','$Lec','$Lab','$Unit','$Prereq','$MajorId','$cur')";
	
		dbQuery($sql);
		header('Location: ' . $_SERVER['HTTP_REFERER']. '&cur='.$cur.'&success=You have Successfully Added a New Major');	
	}
}

/*
	Modify a Major
*/
function modifyMajor()
{
	$Id   = (int)$_POST['txtId'];	
    $Code = $_POST[''];
    $Desc = $_POST['txtDesc'];
	
	$sql   = "UPDATE tbl_major 
	          SET m_code='$Code', m_desc='$Desc'
			  WHERE m_id = $Id";

	dbQuery($sql);
	header('Location: index.php?success=' . urlencode('You have Successfully Modified this Major'));

}/*
	Modify a Major
*/
function changepass()
{
	$session = $_SESSION["Majorname"];	
    $Password = $_POST['txtPassword'];
    $Password2 = $_POST['txtPassword2'];
	
	if ($Password != $Password2)
	{
	header('Location: index.php?view=changepassword&alert=' . urlencode('PassWord Do not Match'));
	}
	else
	{
	
	$sql   = "UPDATE tbl_Major 
	          SET Major_password = PASSWORD('$Password')
			  WHERE Major_name = '$session'";

	dbQuery($sql);
	header('Location: index.php?view=changepassword&alert=' . urlencode('You have Successfully Modified this Major'));
}
}

/*
	Remove a Major
*/
function deleteMajor()
{
	if (isset($_GET['MajorId']) && (int)$_GET['MajorId'] > 0) {
		$MajorId = (int)$_GET['MajorId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_major 
	        WHERE m_id = $MajorId";
	dbQuery($sql);
	
	header('Location: index.php?success=You Have Successfully Deleted this Major');
}
/*
	Remove a Major
*/
function delete()
{
	if (isset($_GET['ClassId']) && (int)$_GET['ClassId'] > 0) {
		$ClassId = (int)$_GET['ClassId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_class 
	        WHERE c_id = $ClassId";
	dbQuery($sql);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']. '&success=You Have Successfully Deleted this Class');
}
?>