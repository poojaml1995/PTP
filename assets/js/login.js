function validateForm() {
    document.getElementById('validateemail').textContent = "";
    document.getElementById('validatepassword').textContent = "";

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    var flag = true;

    if (email == "") {
        document.getElementById('validateemail').textContent = "Please enter email..";
        document.getElementById('email').style.border = "1px solid red";
        flag = false;
    }
    if (password == "") {
        document.getElementById('validatepassword').textContent = "Please enter password..";
        document.getElementById('password').style.border = "1px solid red";
        flag = false;
    }
    return flag;
}

function clearvalidateemail() {
    document.getElementById('validateemail').textContent = "";
    document.getElementById('email').style.border = "1px solid green";
}

function clearvalidatepassword() {
    document.getElementById('validatepassword').textContent = "";
    document.getElementById('password').style.border = "1px solid green";
}

function togglePassword() {
    // Get the checkbox
    var checkBox = document.getElementById("showPassword");
    // Get the output text
    var password = document.getElementById("password");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        password.type = "text";
    } else {
        password.type = "password";
    }
}