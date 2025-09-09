var search_parameter = window.location.search;

var param = new URLSearchParams(search_parameter);
var error_message = param.get("error");
var Username = param.get("username");
var Password = param.get("password");
var Email = param.get("email");
var Address = param.get("address");
var Role = param.get("role");
var Telephone = param.get("telephone");
// var Photo_Profile = param.get("pp");

if(error_message == "invalid_user"){
	document.getElementById('username-box').textContent = "username already in used";
	document.getElementById('email-box').textContent = "email already in used";
	document.getElementById('telephone-box').textContent = "number already in used";

	document.getElementById('username-box').style.color = "red";
	document.getElementById('email-box').style.color = "red";
	document.getElementById('telephone-box').style.color = "red";

	document.getElementById('username-field').style.backgroundColor = "#f66151";
	document.getElementById('email-field').style.backgroundColor = "#f66151";
	document.getElementById('telephone-field').style.backgroundColor = "#f66151";

	document.getElementById('username-field').value = Username;
	document.getElementById('password-field').value = Password;
	document.getElementById('email-field').value = Email;
	document.getElementById('address-field').value = Address;
	document.getElementById('telephone-field').value = Telephone;
	document.getElementById('role-field').value = Role;
	// document.getElementById('image-photo-profile').src = Photo_Profile;
}

function UpdateTime(){
	var WebTime = new Date;
	var seconds = WebTime.getSeconds();
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


