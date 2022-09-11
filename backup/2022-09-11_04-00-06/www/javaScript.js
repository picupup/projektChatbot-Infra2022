//sets the needed variables and calls the functions
function main(){
	var form = document.forms['robbi'] //DOM (Document Object Model)
	var form_question = form['question'].value
	printChat(form_question, "question")
	setTimeout(function(){var answer = getAnswer(form_question)}, 500) //sets a delay of a half of a second 
	form['question'].value = "";
}
//gets the the answer per Ajax from the algorithm
function getAnswer(question){
	var xhr = new XMLHttpRequest() //Here begins Ajax
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			printChat(xhr.response, "answer")
		}
	}
	xhr.open("GET", 'call_algorithm.php' + "?question='"+question+"'", true);
	xhr.send();
}
//function to create an new DOM-Element and to put it on the site
function printChat(toPrint, flag){
	var chat_object = document.createElement("div")
	chat_object.className = (flag+ " chat_object")
	chat_object.innerHTML = toPrint
	var chat_box = document.getElementById("dialoge")
	chat_box.appendChild(chat_object)
	updateScroll()
}
//function to keep the scroll bar at the bottom
function updateScroll(){
    var element = document.getElementById("dialoge");
    element.scrollTop = element.scrollHeight;
}
//lets Robbi say hello
window.onload = function initial(){
	printChat("Hello i'm Robbi. Ask me a question.", "answer")
}
