let fullName = document.getElementById("name");
let password = document.getElementById("pswd");
let cpassword = document.getElementById("cpswd");

function validateform() {
    let flag = true;

    // First name validation
    if (fullName.value === "") {
        document.getElementById("fnameError").innerHTML =
            "First name is required";
        flag = false;
    } else if (/\d/.test(fullName.value)) {
        document.getElementById("fnameError").innerHTML =
            "First name should not contain numeric values";
        flag = false;
    } else if (/[^a-zA-Z0-9]/.test(fullName.value)) {
        document.getElementById("fnameError").innerHTML =
            "First name should not contain special characters";
        flag = false;
    } else if (fullName.value.length < 3) {
        document.getElementById("fnameError").innerHTML =
            "First name requires a minimum of 3 characters";
        flag = false;
    } else {
        document.getElementById("fnameError").innerHTML = "";
    }

    // Password validation
    if (password.value === "") {
        document.getElementById("pswdError").innerHTML =
            "Password is required!!";
        flag = false;
    } else if (password.value.length < 8 || password.value.length > 16) {
        document.getElementById("pswdError").innerHTML =
            "Password should be between 8 and 16 characters";
        flag = false;
    } else if (
        !/[a-z]/.test(password.value) ||
        !/[A-Z]/.test(password.value) ||
        !/\d/.test(password.value) ||
        !/[^a-zA-Z0-9]/.test(password.value)
    ) {
        document.getElementById("pswdError").innerHTML =
            "Password should include uppercase and lowercase letters, numbers, and special characters";
        flag = false;
    } else {
        document.getElementById("pswdError").innerHTML = "";
    }

    // Confirm password validation
    if (cpassword.value === "") {
        document.getElementById("cpswdError").innerHTML =
            "Confirm your Password!!";
        flag = false;
    } else if (cpassword.value !== password.value) {
        document.getElementById("cpswdError").innerHTML =
            "Passwords do not match";
        flag = false;
    } else {
        document.getElementById("cpswdError").innerHTML = "";
    }

    return flag && middleNameValid;
}
