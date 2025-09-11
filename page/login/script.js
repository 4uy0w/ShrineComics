function UpdateTime(){
	var WebTime = new Date;
	var minutes = WebTime.getMinutes();
	var hours = WebTime.getHours();

	hours = String(hours).padStart(2,'0');
	minutes = String(minutes).padStart(2,'0');

	let time_string = `${hours}:${minutes}`;
	document.getElementById('clock-java').textContent = time_string;
}

UpdateTime();
setInterval(UpdateTime,1000);
