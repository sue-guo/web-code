// let imgDiv = document.getElementsByClassName('form-group-img')[0];
// let imgNum = 0;

// function addImageDiv(){
//    imgNum++;
//    let newImgDiv = imgDiv.cloneNode(true); 
//    newImgDiv.querySelector('input').id = 'image' + imgNum;
//    document.getElementById('form-group-img-container').append(newImgDiv)
// }
document.onload = addImageDiv1();

//create a new image div
let imgDiv1 = document.getElementById('imageTemplate');
function addImageDiv1(){
    //create a new image node
   let newImgDiv = document.importNode(imageTemplate.content, true);
   //append the new image node to the form-group-img-container
   document.getElementById('form-group-img-container').appendChild(newImgDiv)
}
//remove the image div
function removeImageDiv(obj){
    obj.parentElement.remove();
}

// TODO: add validation for the add page
function validateAdd(){
    let valid = true;
    //check if there is at least one image
    let images = document.querySelectorAll("input[type='file']");//array of all file inputs
    if(images !== null && images.length > 0){
        //check if all the image inputs have a file
        for(let i = 0; i < images.length; i++){
            if(images[i].files.length == 0){
                alert("Please select an image." + "for the " + (i+1) + "th image.");
                valid = false;
                break;
            }
        }
    }else{
        alert("Please select at least one image.");
        valid = false;
    }
    //check all image textareas have a value if there is textareas
   return valid;
}

const imageTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

function validateImage(thisInput) {
    let file = thisInput.files[0];
    if (!imageTypes.includes(file.type)) { 
        alert('Please select an image file.');
        thisInput.value = ''; // 清空文件输入框
    }
}

function removeImageData(thisInput){
    if(confirm("Are you sure you want to remove this image?")){
        removeImageDiv(thisInput);
    }
}