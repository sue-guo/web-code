let imgDiv = document.getElementsByClassName('form-group-img')[0];
let imgNum = 0;

function addImageDiv(){
    imgNum++;
   let newImgDiv = imgDiv.cloneNode(true); 
   newImgDiv.querySelector('input').id = 'image' + imgNum;
   newImgDiv.querySelector('label').htmlFor = 'image' + imgNum;
   document.getElementById('form-group-img-container').append(newImgDiv)
}

function removeImageDiv(obj){
    obj.parentElement.remove();
}