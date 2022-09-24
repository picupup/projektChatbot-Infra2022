function err_incorrect(){
    var error_object = document.createElement("p")
    error_object.innerHTML = "Email or Password is wrong."
    error_object.id = "error"
    let form = document.getElementById('login_form')
    form.insertBefore(error_object, form.children[4])
}

function err_pwd_match(){
    var error_object = document.createElement("p")
    error_object.innerHTML = "Your Passwords does not match!"
    error_object.id = "error"
    let form = document.getElementById('sign_up')
    form.insertBefore(error_object, form.children[23])
}

function err_email_exists(){
    var error_object = document.createElement("p")
    error_object.innerHTML = "Mail address already exists!"
    error_object.id = "error"
    let form = document.getElementById('sign_up')
    form.insertBefore(error_object, form.children[23])
}
