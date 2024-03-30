let user = document.getElementById('name');
let user_span = document.createElement('span');
user_span.setAttribute("class", "errorMsg");
user.after(user_span);

let subject = document.getElementById('subject');
let subject_span = document.createElement('span');
subject_span.setAttribute("class", "errorMsg");
subject.after(subject_span);

let message = document.getElementById('message');
let message_span = document.createElement('span');
message_span.setAttribute("class", "errorMsg");
message.after(message_span);

let email = document.getElementById('email');
let email_span = document.createElement('span');
email_span.setAttribute("class", "errorMsg");
email.after(email_span);


let noError = "";
let user_error_msg = noError;
let subject_error_msg = noError;
let email_error_msg = noError;
let message_error_msg = noError;

function validate(){
    let valid = true;

    validateUser();
    validateSubject();
    vaildateEmail();
    validateMessage();

    if(user_error_msg !== noError){
        user_span.textContent = user_error_msg;
        valid = false;
    }
    
    if(subject_error_msg !== noError){
        subject_span.textContent = subject_error_msg;
        valid = false;
    }
    
    if(email_error_msg !== noError){
        email_span.textContent = email_error_msg;
        valid = false;
    }
    
    if(message_error_msg !== noError){
        message_span.textContent = message_error_msg;
        valid = false;
    }

    return valid;
}

function validateUser() {
    let value = user.value.trim();
    if(value == ""){
        user_error_msg = "please enter a username";
    }else if(value.length < 4){
        user_error_msg = "The user must be at least 4 characters long";
    }
}

function validateSubject() {
    let value = subject.value.trim();
    if(value == ""){
        subject_error_msg = "please enter subject";
    }else if(value.length < 10){
        subject_error_msg = "The subject must be at least 10 characters long";
    }
}

function validateMessage() {
    let value  = message.value.trim();
    if(value == ""){
        message_error_msg = "please enter message";
    }else if(value.length < 30){
        message_error_msg = "The message must be at least 30 characters long";
    }
}

function vaildateEmail(){ 
    let value = email.value.trim(); // access the value of the email 
    let regexp=/\S+@\S+\.\S+/; //reg. expression 
    
    if(!regexp.test(value)){ //test is predefind method to check if the entered email matches the regexp 
        email_error_msg = "Invalid email address";// Email address should be non-empty with format xyz@xyz.xyz";
    }
    else{
        email_error_msg = noError;
    }
}

function resetUserError(){
    user_error_msg = noError;
    user_span.textContent = noError;
}

function resetSubjectError(){
    subject_error_msg = noError;
    subject_span.textContent = noError;
}

function resetEmailError(){
    email_error_msg = noError;
    email_span.textContent = noError;
}

function resetMessageError(){
    message_error_msg = noError;
    message_span.textContent = noError;
}

user.addEventListener("focus",resetUserError);
subject.addEventListener("focus",resetSubjectError);
email.addEventListener("focus",resetEmailError);
message.addEventListener("focus",resetMessageError);