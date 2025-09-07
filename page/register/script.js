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
