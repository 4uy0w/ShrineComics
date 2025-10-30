let buttonEditImage = document.getElementById("button-edit-page-image");
let ImagePreview = document.getElementById("preview-image-chapter-page");
let fileFieldImage = document.getElementById("chapter-page-image");

buttonEditImage.addEventListener("click",function (){
    fileFieldImage.click();
});
fileFieldImage.addEventListener("change",function(event){
    let imageSource = event.target.files[0];
    let ImageURL = URL.createObjectURL(imageSource);
    ImagePreview.setAttribute("src",ImageURL);
})