document.onload = addImageDiv1();

let title = document.getElementById('title');
let description = document.getElementById('description');
let Location = document.getElementById('location');

let titleError = document.getElementById('title_error');
let descriptionError = document.getElementById('description_error');
let locationError = document.getElementById('location_error');
let imageError = document.getElementById('img_error');

function validateAdd(){
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
    //check if there is at least one image
    let images = document.querySelectorAll("input[type='file']");//array of all file inputs
    if(images !== null && images.length > 0){
        //check if all the image inputs have a file
        for(let i = 0; i < images.length; i++){
            if(images[i].files.length == 0){
                //alert("Please select an image." + "for the " + (i+1) + "th image.");
                imageError.innerHTML = "Please select an image.";
                valid = false;
                break;
            }
        }
    }else{
        alert("Please select at least one image.");
        valid = false;
    }
   return valid;
}

const imageTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

function validateImage(thisInput) {
    let file = thisInput.files[0];
    if (!imageTypes.includes(file.type)) { 
        alert('Please select an image file.');
        thisInput.value = ''; // 清空文件输入框
    }
    resetImageError();
}

function removeImageData(thisInput){
    if(confirm("Are you sure you want to remove this image?")){
        removeImageDiv(thisInput);
    }
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

function resetImageError(){
    imageError.innerHTML = "";
}
//reset the form, reload the page
document.getElementById("reset").addEventListener("click", function(){
    location.reload();
});


//create a new image div
let imgDiv1 = document.getElementById('imageTemplate');
function addImageDiv1(){
    //create a new image node
   let newImgDiv = document.importNode(imageTemplate.content, true);
   //append the new image node to the form-group-img-container
   document.getElementById('form-group-img-container').appendChild(newImgDiv);
}
//remove the image div
function removeImageDiv(obj){
    obj.parentElement.remove();
    resetImageError();//reset the image error message
}