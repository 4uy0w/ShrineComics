// file field
let FieldUploadComic = document.getElementById("hidden-gem-image");
let FieldUploadBanner = document.getElementById("hidden-gem-banner");
// button upload
let ButtonUploadComic = document.getElementById("image-comic-btn");
let ButtonUploadBanner = document.getElementById("banner-comic-btn");
// preview
let PreviewComic = document.getElementById("comic-image-view");
let PreviewBanner = document.getElementById("comic-banner-view");
// button reset 
let ButtonReset = document.getElementById("reset-btn");

ButtonUploadComic.addEventListener("click",function (){
    FieldUploadComic.click();
});
ButtonUploadBanner.addEventListener("click", function(){
    FieldUploadBanner.click();
});
ButtonReset.addEventListener("click",function (){
    PreviewComic.src = "../../../image/no-image.png";
    PreviewBanner.src = "../../../image/no-image.png";
});

FieldUploadComic.addEventListener("change", function(event){
    let UploadedComic = event.target.files[0];
    let URLUploadedComic = URL.createObjectURL(UploadedComic);
    PreviewComic.src = URLUploadedComic;
});
FieldUploadBanner.addEventListener("change", function(event){
    let UploadedBanner = event.target.files[0];
    let URLUploadedBanner = URL.createObjectURL(UploadedBanner);
    PreviewBanner.src = URLUploadedBanner;
});