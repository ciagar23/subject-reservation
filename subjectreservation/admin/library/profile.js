// JavaScript Document
function checkAddProfileForm()
{
	with (window.document.frmAddProfile) {
		if (isEmpty(txtFName, 'Enter First Name')) {
			return;
		} else if (isEmpty(txtLName, 'Enter Lastname')) {
			return;
		} else if (isEmpty(txtGender, 'Enter Gender')) {
			return;
		} else if (isEmpty(txtBDegree, 'Enter Bachelors Degree')) {
			return;
		} else if (isEmpty(txtSchool, 'Enter School Graduated')) {
			return;
		} else if (isEmpty(txtSeminar, 'Enter Seminar Attended')) {
			return;
		} else {
			submit();
		}




	}
}

function checkPassword()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtPassword, 'Enter First Password')) {
			return;
		} else if (isEmpty(txtPassword2, 'Repeat Password')) {
			return;
		} else {
			submit();
		}
	}
}

function addUser()
{
	window.location.href = 'index.php?view=add';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}

function deleteUser(userId)
{
	if (confirm('Delete this user?')) {
		window.location.href = 'processUser.php?action=delete&userId=' + userId;
	}
}

