// JavaScript Document
function checkAddScheduleForm()
{
	with (window.document.frmAddSchedule) {
		if (isEmpty(txtCName, 'Enter Class Name')) {
			return;
		} else if (isEmpty(txtSubject, 'Enter Subject')) {
			return;
		} else if (isEmpty(txtRoom, 'Enter Room')) {
			return;
		} else if (isEmpty(txtFrom, 'Select Start Time')) {
			return;
		} else if (isEmpty(txtTo, 'Select End Time')) {
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

function modifySchedule(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}

function deleteSchedule(userId)
{
	if (confirm('Delete this Time Slot?')) {
		window.location.href = 'processSchedule.php?action=delete&userId=' + userId;
	}
}

