function giveIn(){
	var form = document.forms['robbi'] //DOM (Document Object Model)
	var form_question = form['question'].value
	printChat(form_question, "question")
	setTimeout(function(){var answer = getAnswer(form_question)}, 500)
	form['question'].value = "";
}
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
function printChat(toPrint, flag){
	var chat_object = document.createElement("div")
	chat_object.className = (flag+ " chat_object")
	chat_object.innerHTML = toPrint
	var chat_box = document.getElementById("dialoge")
	chat_box.appendChild(chat_object)
	updateScroll()
}

function updateScroll(){
    var element = document.getElementById("dialoge");
    element.scrollTop = element.scrollHeight;
}
window.onload = function initial(){
	printChat("Hello i'm Robbi. Ask me a question.", "answer")
}
