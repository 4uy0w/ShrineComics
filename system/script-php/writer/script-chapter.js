let UploadImageButton = document.getElementById("chapter-image-button");
let FieldImageFile = document.getElementById("chapter-comic-upload-invisible");

UploadImageButton.addEventListener("click",function (){ FieldImageFile.click(); });
FieldImageFile.addEventListener("change", function (event){
    if(PhotoBannerFile){
        window.alert("success to upload comic banner");
        UploadImageButton.innerText("Upload: OK");
    }
});
