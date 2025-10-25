let UploadBannerButton = document.getElementById("comic-upload-banner-button");
let FieldBannerFile = document.getElementById("invisible-box-banner");
let FieldBannerUploadStatus = document.getElementById("status-text");

UploadBannerButton.addEventListener("click",function (){ FieldBannerFile.click(); });

FieldBannerFile.addEventListener("change", function (event){
    let PhotoBannerFile = event.target.files[0];
    if(PhotoBannerFile){
        window.alert("success to upload comic banner");
        let ImageBannerLink = URL.createObjectURL(PhotoBannerFile);
        UploadBannerButton.innerText = "Upload Banner: OK";
    }else{
        UploadBannerButton.innerText = "Upload Banner: FAILED";
    }
});
