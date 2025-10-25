let UploadImageButton = document.getElementById("chapter-image-button");
let FieldImageFile = document.getElementById("chapter-comic-upload-invisible");
let PreviewImage = document.getElementById("preview-image");

UploadImageButton.addEventListener("click",function (){ FieldImageFile.click(); });
FieldImageFile.addEventListener("change", function (event){
    let PhotoBannerFile = event.target.files[0];
    if(PhotoBannerFile){
        window.alert("success to upload comic banner");
        let ImageBannerLink = URL.createObjectURL(PhotoBannerFile);
        PreviewImage.setAttribute("src",ImageBannerLink);
    }
});
