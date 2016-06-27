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


function checkAddSubjectForm()
{
	with (window.document.frmAddSubject) {
		if (isEmpty(txtCode, 'Enter Code')) {
			return;
		} else if (isEmpty(txtDesc, 'Enter Description')) {
			return;
		} else if (isEmpty(txtUnit, 'Enter Unit')) {
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


function deleteSubject(SubjectId)
{
	if (confirm('Delete this Subject?')) {
		window.location.href = 'processSubjects.php?action=deleteSubject&SubjectId=' + SubjectId;
	}
}

