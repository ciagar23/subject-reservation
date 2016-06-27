<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'addMajor' :
		addMajor();
		break;
	
	case 'addSubject' :
		addSubject();
		break;
		
	case 'modifyMajor' :
		modifyMajor();
		break;
		
	case 'deleteMajor' :
		deleteMajor();
		break;
		
   	case 'deleteSubject' :
		deleteSubject();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main Major page
		header('Location: index.php');
}


function addMajor()
{
    $Code = $_POST['txtCode'];
    $Desc = $_POST['txtDesc'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the Majorname is taken
	$sql = "SELECT m_code
	        FROM tbl_major
			WHERE m_code = '$Code'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=addMajor&error=' . urlencode('This Major Already Exist'));	
	} else {			
		$sql   = "INSERT INTO tbl_major (m_code, m_desc)
		          VALUES ('$Code','$Desc')";
	
		dbQuery($sql);
		header('Location: index.php?success=' . urlencode('You have Successfully Added a New Major'));	
	}
}


function addSubject()
{
    $Code = $_POST['txtCode'];
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
    $Code = $_POST['txtCode'];
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
function deleteSubject()
{
	if (isset($_GET['SubjectId']) && (int)$_GET['SubjectId'] > 0) {
		$SubjectId = (int)$_GET['SubjectId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_subject 
	        WHERE s_id = $SubjectId";
	dbQuery($sql);
	
	header('Location: ' . $_SERVER['HTTP_REFERER']. '&success=You Have Successfully Deleted this Subject');
}
?>