//var form = document.forms['robbi'].element['question'].value


console.log("aus der javaScript.js");


function senden(){

	console.log("aus der submit-Funktion");

	var form = document.forms['robbi']; //DOM (Document Object Model)
	var form_question = form['question'].value;
	console.log(form_question);
	var xhr = new XMLHttpRequest() //Here begins Ajax
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("rectangle").innerHTML = (xhr.responseText)
		}
	}
	xhr.open("GET", 'call_algorithm.php' + "?question='"+form_question+"'", true);
	xhr.send();

	form['question'].value = "";
}


// var message = form["name"].value



