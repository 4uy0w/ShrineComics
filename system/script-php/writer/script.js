let FileField = document.getElementById("comic-image");
let ButtonUpload = document.getElementById("upload-image-btn");
let FileFieldImage = document.getElementById("image-comic");

let BannerField = document.getElementById("comic-banner");
let BannerUpload = document.getElementById("upload-banner-btn");
let BannerFieldImage = document.getElementById("image-banner");

ButtonUpload.addEventListener("click",function (){
    FileField.click();
});
BannerUpload.addEventListener("click",function (){
    BannerField.click();
});

BannerField.addEventListener("change",function (event){
    let FileBanner = event.target.files[0];
    let ImageBannerURL = URL.createObjectURL(FileBanner);
    BannerFieldImage.setAttribute("src",ImageBannerURL);
});
FileField.addEventListener("change",function (event){
    let FileComic = event.target.files[0];
    let ImageComicURL = URL.createObjectURL(FileComic);
    FileFieldImage.setAttribute("src",ImageComicURL);
});

