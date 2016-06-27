// JavaScript Document
function checkAddUserForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(cardType, 'Select Credit Card Type (Mastercard/VISA)')) {
			return;
		} else if (isEmpty(cNum, 'Enter Credit Card Number')) {
			return;
		} else if (isEmpty(vNum, 'Enter Credit Card Validation Number\n (the last 3 digits of your card)')) {
			return;			
		} else if (isEmpty(expMonth, 'Enter Expiration Date(month)')) {
			return;
		} else if (isEmpty(expYear, 'Enter Expiration Date(year)')) {
			return;
		} else if (isEmpty(fName, 'Enter First Name of the Card Holder')) {
			return;
		} else if (isEmpty(lName, 'Enter Last Name of the Card Holder')) {
			return;
		} else if (confirm('If you proceed you will be unable to add/change your subjects.')) {
			submit();
		}
	}
}