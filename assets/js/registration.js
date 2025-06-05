function validateForm() {
    document.getElementById('validatename').textContent = "";
    document.getElementById('validatecontactnumber').textContent = "";
    document.getElementById('validateemail').textContent = "";
    document.getElementById('validatepassword').textContent = "";
    document.getElementById('validatelabname').textContent = "";

    var name = document.getElementById('name').value;
    var contactnumber = document.getElementById('contactnumber').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var labname = document.getElementById('labname').value;

    var flag = true;

    if (name == "") {
        document.getElementById('validatename').textContent = "Please enter name..";
        document.getElementById('name').style.border = "1px solid red";
        flag = false;
    }
    if (contactnumber == "") {
        document.getElementById('validatecontactnumber').textContent = "Please enter contact number..";
        document.getElementById('contactnumber').style.border = "1px solid red";
        flag = false;
    }
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
    if (labname == "") {
        document.getElementById('validatelabname').textContent = "Please enter labname..";
        document.getElementById('labname').style.border = "1px solid red";
        flag = false;
    }
    return flag;
}

function clearvalidatename() {
    document.getElementById('validatename').textContent = "";
    document.getElementById('name').style.border = "1px solid green";
}

function clearvalidatecontactnumber() {
    document.getElementById('validatecontactnumber').textContent = "";
    document.getElementById('contactnumber').style.border = "1px solid green";
}

function clearvalidateemail() {
    document.getElementById('validateemail').textContent = "";
    document.getElementById('email').style.border = "1px solid green";
}

function clearvalidatepassword() {
    document.getElementById('validatepassword').textContent = "";
    document.getElementById('password').style.border = "1px solid green";
}

function clearvalidatelabname() {
    document.getElementById('validatelabname').textContent = "";
    document.getElementById('labname').style.border = "1px solid green";
}