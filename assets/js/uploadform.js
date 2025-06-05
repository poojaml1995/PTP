function validateform() {
    document.getElementById("validatelaboratoryname").textContent = "";
    document.getElementById("validatelaboratorycode").textContent = "";
    document.getElementById("validatefile").textContent = "";

    var laboratoryname = document.getElementById("LaboratoryName").value;
    var laboratorycode = document.getElementById("LaboratoryCode").value;


    var flag = true;

    if (laboratoryname == "") {
        document.getElementById("validatelaboratoryname").textContent = "Please Enter Laboratory Name";
        document.getElementById("LaboratoryName").style.border = "1px solid red";
        flag = false;
    } else if (!(validateEmail(laboratoryname))) {
        document.getElementById("validatelaboratoryname").textContent = "Please Enter Valid Laboratory Name";
        document.getElementById("LaboratoryName").style.border = "1px solid red";
        flag = false;
    }
    if (laboratorycode == "") {
        document.getElementById("validatelaboratorycode").textContent = "Please Enter Laboratory Code";
        document.getElementById("LaboratoryCode").style.border = "1px solid red";
        flag = false;
    } else if (!(validateEmail(laboratorycode))) {
        document.getElementById("validatelaboratorycode").textContent = "Please Enter Valid Laboratory Code";
        document.getElementById("LaboratoryCode").style.border = "1px solid red";
        flag = false;
    }

    if (!fileValidation()) {
        document.getElementById("validatefile").textContent = "Please Select Valid File";
        document.getElementById("PDFFile").style.border = "1px solid red";
        flag = false;
    }
    return flag;
}

function fileValidation() {
    var file = document.getElementById("PDFFile");

    if (file.files.length != 0) {
        if (file.files[0].type === 'application/pdf') {
            return true;
        } else {
            return false;
        }
    }
}

function clearlaboratorynamevalidation() {
    document.getElementById("validatelaboratoryname").textContent = "";
    document.getElementById("LaboratoryName").style.border = "1px solid green";
}

function clearlaboratorycodevalidation() {
    document.getElementById("validatelaboratorycode").textContent = "";
    document.getElementById("LaboratoryCode").style.border = "1px solid green";
}

function clearfilevalidation() {
    document.getElementById("validatefile").textContent = "";
    document.getElementById("PDFFile").style.border = "1px solid green";
}