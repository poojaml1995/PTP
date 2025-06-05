function validateform() {
    document.getElementById("validateusername").textContent = "";
    document.getElementById("validateemail").textContent = "";
    document.getElementById("validatesubject").textContent = "";
    document.getElementById("validatemessage").textContent = "";

    var username = document.getElementById("UserName").value;
    var email = document.getElementById("Email").value;
    var subject = document.getElementById("Subject").value;
    var message = document.getElementById("Message").value;

    var flag = true;

    if (username == "") {
        document.getElementById("validateusername").textContent = "Please enter your name";
        document.getElementById("UserName").style.border = "1px solid red";
        flag = false;
    }

    if (email == "") {
        document.getElementById("validateemail").textContent = "Please enter your email id";
        document.getElementById("Email").style.border = "1px solid red";
        flag = false;
    } else if (!checkEmail(email)) {
        document.getElementById("validateemail").textContent = "Please enter your email id";
        document.getElementById("Email").style.border = "1px solid red";
        flag = false;
    }

    if (subject == "") {
        document.getElementById("validatesubject").textContent = "Please enter subject";
        document.getElementById("Subject").style.border = "1px solid red";
        flag = false;
    }

    if (message == "") {
        document.getElementById("validatemessage").textContent = "Please enter message";
        document.getElementById("Message").style.border = "1px solid red";
        flag = false;
    }

    return flag;

}

function clearvalidateusername() {
    document.getElementById("validateusername").textContent = "";
    document.getElementById("UserName").style.border = "1px solid green";
}

function clearvalidateemail() {
    document.getElementById("validateemail").textContent = "";
    document.getElementById("Email").style.border = "1px solid green";
}

function clearvalidatesubject() {
    document.getElementById("validatesubject").textContent = "";
    document.getElementById("Subject").style.border = "1px solid green";
}

function clearvalidatemessage() {
    document.getElementById("validatemessage").textContent = "";
    document.getElementById("Message").style.border = "1px solid green";
}