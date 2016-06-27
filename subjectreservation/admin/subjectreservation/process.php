<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		add();
		break;
		
		
	case 'autoevaluate' :
		autoevaluate();
		break;
		
		
    case 'delete' :
		delete();
		break;
		
    case 'deleteReservation' :
		deleteReservation();
		break;
		
    case 'student' :
		student();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main Major page
		header('Location: index.php');
}


function add()
{
    
$code=$_GET['code'];
$subjcode=$_GET['subjcode'];
$student=$_GET['student'];
$schedstart=$_GET['schedstart'];
$schedday=$_GET['schedday'];
$datenow = DATE("Y-m-d");

		$sql   = "INSERT INTO tbl_subjectreservation (sr_code, sr_subjcode, sr_student, sr_schedstart, sr_schedday,sr_date)
		          VALUES ('$code','$subjcode', '$student', '$schedstart', '$schedday','$datenow')";
	
		dbQuery($sql);
		header('Location: index.php?code='.$subjcode.'&success=' . urlencode('You have Successfully Reserved this Class'));	
}


function autoevaluate()
{
    $student = $_GET['student'];
    $teacher = $_GET['teacher'];
    $cur = $_GET['cur'];
	$datenow = date("m-d-Y");
	
	$sql = "SELECT s_id, s_code, s_desc, s_lec, s_lab, s_unit, s_prereq, s_majorid, s_semyear
        FROM tbl_subject where s_semyear like '%$cur%'";
	$result = dbQuery($sql);

	while($row = dbFetchAssoc($result)) {
	extract($row);
$checkEvaluation = mysql_num_rows(mysql_query("SELECT * FROM tbl_evaluation where e_code='$s_code' and e_student='$student'"));
if($checkEvaluation==0){
	
	dbQuery("INSERT INTO tbl_evaluation (e_code, e_evaluator, e_student,e_date)
		          VALUES ('$s_code','$teacher', '$student','$datenow')");
				  }
				  else 
				  { }
	
	header('Location: index.php?view=list');

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
function student()
{
    $IdNumber = $_POST['IdNumber'];
	
	$checkstudent = mysql_num_rows(mysql_query("SELECT * FROM tbl_user where user_name='$IdNumber'"));
		if ( $checkstudent == 0)
		{
		header('Location: index.php?&error=ID Number Incorrect');
		}
		else
		{
			
	$_SESSION['student'] = $IdNumber;
	header('Location: index.php?view=list');
		}
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
/*
	Remove a Major
*/
function deleteReservation()
{
	if (isset($_GET['srId']) && (int)$_GET['srId'] > 0) {
		$srId = (int)$_GET['srId'];
	} else {
		header('Location: index.php');
	}
	
	$sql = "DELETE FROM tbl_subjectreservation 
	        WHERE sr_id = $srId";
	dbQuery($sql);
	
	header('Location: index.php?success=You Have Successfully Removed This Reserved Class');
}
?>