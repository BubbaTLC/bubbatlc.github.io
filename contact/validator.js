/**
 * The purpose of this document is to provide client side validation for
 * the contact page.
 *
 * Date Created: 01/04/2020
 * Created By: Bubba Chabot
 */

let name = document.contactForm.Name.value;
let email = document.contactForm.Email.value;
let organization = document.contactForm.Organization.value;
let message = document.contactForm.Message.value;

document.onload = function() {
	document.getElementById("contactForm").onsubmit = handleSubmission;
	document.contactForm.Name = validateForm();
	console.log("Here");
};

function handleSubmission(event)
{
	console.log("Here");
	event.preventDefault();
	validateForm();
}

function validateForm()
{
	console.log("Here");
	if(validateName() && validateEmail() && validateOrganization() && validateMessage())
	{
		document.getElementById("subject").value = formatSubject();
	}
	else
	{
		!validateName() ? document.getElementById("nameError").hidden = false : document.getElementById("nameError").hidden = true;
		!validateEmail() ? document.getElementById("emailError").hidden = false : document.getElementById("emailError").hidden = true;
		!validateOrganization() ? document.getElementById("orgError").hidden = false : document.getElementById("orgError").hidden = true;
		!validateMessage() ? document.getElementById("msgError").hidden = false : document.getElementById("msgError").hidden = true;
	}
	document.contactForm.className = 'needs-validation was-validated';
}

function validateName()
{
	return name.length !== 0;
}

function validateEmail()
{
	var re = /^(([^<>()\[\].,;:\s@"]+(\.[^<>()\[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/i;
	return re.test(String(email).toLowerCase());
}

function validateOrganization()
{
	return organization.length !== 0;
}

function validateMessage()
{
	return message.length !== 0;
}

function formatSubject()
{
	if (validateName() && validateOrganization())
	{
		return `${name} from ${organization}`;
	}
	return "";
}