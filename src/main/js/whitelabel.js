
function complete( amount, total, target) {
	var percentage = Math.floor((amount/total)*100);
	var elem = document.getElementById(target);
	elem.style.width = percentage +"%";
	return percentage;
}

function countdown( date, target) {
	var end = new Date(date);
	var now = new Date();
	var distance = end - now;

	var days = Math.floor(distance / 86400000);
	document.getElementById(target).innerHTML = days;
	return days;
}
