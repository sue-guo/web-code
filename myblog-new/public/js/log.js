/* Purpose: to validate the login and sign up forms */

let username = document.getElementById('username');
let username_span = document.getElementById('username_span');


let password = document.getElementById('password');
let password_span = document.getElementById('password_span');

//if the confirm_password field exists, then it is the sign up page
let password_confirm = document.getElementById('confirm_password');
let password_confirm_span = null;
let signPage = password_confirm !== null;//if the confirm_password field exists, then it is the sign up page
if(signPage){
    password_confirm_span = document.getElementById('confirm_password_span');
}


let noError = "";
let username_error_msg = "";
let password_error_msg = "";
let password_confirm_error_msg = "";

function validate(){
    let valid = true;
    validateUserName();
    validatePassword();
    validatePasswordConfirm();
    //username has an error
    if(username_error_msg !== noError){
        username_span.textContent = username_error_msg;
        valid = false;
    }
    //password has an error
    if(password_error_msg!==noError){
        password_span.textContent = password_error_msg;
        valid = false;

    }
    //password_confirm has an error
    if(password_confirm_error_msg!==noError){
        password_confirm_span.textContent = password_confirm_error_msg;
        valid = false;

    }
    return valid;
}

function validateUserName() {
    let usernamevalue = username.value.trim();
    if(usernamevalue == ""){
        username_error_msg = "please enter a user name";
    }else if(usernamevalue.length < 4){
        username_error_msg = "The username must be at least 4 characters long";
    }
}

function validatePassword(){
    let passwordvalue = password.value;
    if(passwordvalue == ""){
        password_error_msg = "please enter a password";
    }else if(passwordvalue.length < 8){
        password_error_msg = "The password must be at least 8 characters long";
    }
}

function validatePasswordConfirm(){
    if(signPage){
        let passwordvalue = password.value;
        let password_confirm_value = password_confirm.value;
        if(password_confirm_value == ""){
            password_confirm_error_msg = "please re-enter the password";
        }else if(passwordvalue !== password_confirm_value){
            password_confirm_error_msg = "The password and re-entered password must be the same";
        }
    }
}

function resetUsernameError(){
    username_error_msg = noError;
    username_span.textContent = noError;
}

function resetPasswordError(){
    password_error_msg = noError;
    password_span.textContent = noError;
}

username.addEventListener("focus",resetUsernameError);
password.addEventListener("focus",resetPasswordError);

if(signPage){
    function resetPasswordConfirmError(){
        password_confirm_error_msg = noError;
        password_confirm_span.textContent = noError;
    }
    password_confirm.addEventListener("focus",resetPasswordConfirmError);
}

//add event listener to the reset button
if(signPage){
document.getElementById("reset").addEventListener("click",function(){
    resetUsernameError();
    resetPasswordError();
    if(signPage){
        resetPasswordConfirmError();
    }
 });
}