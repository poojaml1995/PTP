function validateForm() {
    document.getElementById('validateemail').textContent = "";
    var email = document.getElementById('email').value;

    var flag = true;

    if (email == "") {
        document.getElementById('validateemail').textContent = "Please enter your email..";
        document.getElementById('email').style.border = "1px solid red";
        flag = false;
    }
    return flag;
}

function clearvalidateemail() {
    document.getElementById('validateemail').textContent = "";
    document.getElementById('email').style.border = "1px solid green";
}