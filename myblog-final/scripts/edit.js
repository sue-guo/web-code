let title = document.getElementById('title');
let description = document.getElementById('description');
let Location = document.getElementById('location');

let titleError = document.getElementById('title_error');
let descriptionError = document.getElementById('description_error');
let locationError = document.getElementById('location_error');

function validateEdit(){
    let valid = true;
    //check if title is empty
    if(title.value === ""){
        titleError.innerHTML = "Title cannot be empty.";
        valid = false;
    }
    //check if description is empty
    if(description.value === ""){
        descriptionError.innerHTML = "Description cannot be empty.";
        valid = false;
    }
    //check if location is empty
    if(Location.value === ""){
        locationError.innerHTML = "Location cannot be empty.";
        valid = false;
    }
   return valid;
}

title.addEventListener('focus', function(){
    titleError.innerHTML = "";
});
description.addEventListener('focus', function(){
    descriptionError.innerHTML = "";
});
Location.addEventListener('focus', function(){
    locationError.innerHTML = "";
});