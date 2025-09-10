var username_field = document.getElementById('username-field');
var password_field = document.getElementById('password-field');
var email_field = document.getElementById('email-field');
var address_field = document.getElementById('address-field');
var telephone_field = document.getElementById('telephone-field');
var role_field = document.getElementById('role-field');

var username_title = document.getElementById('username-box');
var email_title = document.getElementById('email-box');
var telephone_title = document.getElementById('telephone-box');

var parameter = document.location.search;
var SearchURL = new URLSearchParams(parameter);
var error_message = SearchURL.get('error_message');
var Username = SearchURL.get('username');
var Password = SearchURL.get('password');
var Email = SearchURL.get('email');
var Address = SearchURL.get('address');
var Telephone = SearchURL.get('telephone_number');
var Role = SearchURL.get('role');

if(error_message == 'username_already_exists'){
	username_title.textContent = "username already in use";
	email_title.textContent = "email already in use";
	telephone_title.textContent = "telephone number already in use";

	username_title.style.color = "#f66151";
	email_title.style.color = "#f66151";
	telephone_title.style.color = "#f66151";

	username_field.style.backgroundColor = "#f66151";
	email_field.style.backgroundColor = "#f66151";
	telephone_field.style.backgroundColor = "#f66151";

	username_field.value = Username;
	password_field.value = Password;
	email_field.value = Email;
	address_field.value = Address;
	telephone_field.value = Telephone;
	role_field.value = Role;
}

function UpdateTime(){
	var WebTime = new Date;
	var minutes = WebTime.getMinutes();
	var hours = WebTime.getHours();
	var date = WebTime.getDate();
	var months = WebTime.getMonth() + 1;
	var year = WebTime.getFullYear();

	hours = String(hours).padStart(2,'0');
	minutes = String(minutes).padStart(2,'0');

	let time_string = `${hours}:${minutes}/${date}/${months}/${year}`;
	document.getElementById('timestamps-clock').textContent = time_string;
}

UpdateTime();
setInterval(UpdateTime,1000);

document.getElementById('file-field').addEventListener("click",() => {
	document.getElementById('file-upload').click();
});
document.getElementById('file-upload').addEventListener("change",function (event) {
	let PhotoFile = event.target.files[0];
	if(PhotoFile){
		let ImageURL = URL.createObjectURL(PhotoFile);
		document.getElementById('image-photo-profile').setAttribute("src",ImageURL);
		document.getElementById('username-text').innerText= document.getElementById('username-field').value;
	}else{
		window.alert("Gagal");
	}
});


