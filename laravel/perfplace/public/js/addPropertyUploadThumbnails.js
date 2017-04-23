function changeThumbnail(fileInput,imgOutput){
    document.getElementById(fileInput).onchange = function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById(imgOutput).src = fr.result;
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    };
}
$(document).ready(function(){
    changeThumbnail('file-input-1','pic-1');
    changeThumbnail('file-input-2','pic-2');
    changeThumbnail('file-input-3','pic-3');
    changeThumbnail('file-input-4','pic-4');
    changeThumbnail('file-input-5','pic-5');
});
