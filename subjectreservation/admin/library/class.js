// JavaScript Document
function checkAddMajorForm()
{
	with (window.document.frmAddMajor) {
		if (isEmpty(txtCode, 'Enter Code')) {
			return;
		} else if (isEmpty(txtDesc, 'Enter Description')) {
			return;
		} else {
			submit();
		}
	}
}


function checkAddClassForm()
{
	with (window.document.frmAddClass) {
		if (isEmpty(SubjCode, 'Enter Subject Code')) {
			return;
		} else if (isEmpty(ClassCode, 'Enter Class Code')) {
			return;
		} else if (isEmpty(txtFrom, 'Enter Start Time')) {
			return;
		} else if (isEmpty(txtTo, 'Enter End Time')) {
			return;
		} else if (isEmpty(maxStud, 'Enter Maximum Number of Students')) {
			return;
		} else {
			submit();
		}
	}
}



function addMajor()
{
	window.location.href = 'index.php?view=addMajor';
}

function modifyMajor(MajorId)
{
	window.location.href = 'index.php?view=modifyMajor&MajorId=' + MajorId;
}

function viewSem(MajorId)
{
	window.location.href = 'index.php?view=viewSem&MajorId=' + MajorId;
}

function deleteMajor(MajorId)
{
	if (confirm('Delete this Major?')) {
		window.location.href = 'processSubjects.php?action=deleteMajor&MajorId=' + MajorId;
	}
}


function deleteClass(ClassId)
{
	if (confirm('Delete this Class?')) {
		window.location.href = 'processClass.php?action=delete&ClassId=' + ClassId;
	}
}

