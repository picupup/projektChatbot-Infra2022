function anfrage_antwort(e){
	var form = document.forms[""];
	var message = form[""].value;

	var xhr = new XMLHttpRequest()

	xhr.onload=function(){
		var ergebnis = document.getElementById("")
		ergebnis.innerHTML = "Antwort => "
		ergebnis.append(this.responseText)
	}

	xhr.open("GET", '' + query, true);
	xhr.send();
}
