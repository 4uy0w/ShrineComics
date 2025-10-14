// file field
let FieldUploadComic = document.getElementById("comic-hidden-image");
let FieldUploadBanner = document.getElementById("comic-hidden-banner");
// button upload
let ButtonUploadComic = document.getElementById("btn-upload-comic");
let ButtonUploadBanner = document.getElementById("btn-upload-banner");
// preview
let PreviewComic = document.getElementById("image-comic-preview");
let PreviewBanner = document.getElementById("image-banner-preview");

ButtonUploadComic.addEventListener("click",function (){
    FieldUploadComic.click();
});
ButtonUploadBanner.addEventListener("click", function(){
    FieldUploadBanner.click();
});

FieldUploadComic.addEventListener("change", function(event){
    let UploadedComic = event.target.files[0];
    let URLUploadedComic = URL.createObjectURL(UploadedComic);
    PreviewComic.src = URLUploadedComic;
})
FieldUploadBanner.addEventListener("change", function(event){
    let UploadedBanner = event.target.files[0];
    let URLUploadedBanner = URL.createObjectURL(UploadedBanner);
    PreviewBanner.src = URLUploadedBanner;
})