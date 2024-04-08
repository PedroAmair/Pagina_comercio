import Dropzone from "dropzone";
import jQuery from "jquery";
import Swal from "sweetalert2";

window.$ = jQuery;

let arrayNames = [];
let arrayList = [];
let firstUpload = [];
let route;
let position;

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Upload/Drop your files here",
    acceptedFiles: ".png,.jpg,.jpeg,.gif,.webp",
    addRemoveLinks: true,
    dictRemoveFile: 'Delete file',
    maxFiles: 5,
    uploadMultiple: false,

    init: function() {
        if(document.querySelector('[name="image[]"]').value.trim()) {
            arrayList = document.querySelector('[name="image[]"]').value;
            arrayList = arrayList.split(',');
            for(let i=0; i < arrayList.length; i++) {
                const publishedImage = {}
                publishedImage.size = 124;
                publishedImage.name = arrayList[i];
                this.options.addedfile.call(this, publishedImage);
                this.options.thumbnail.call(this, publishedImage, `/uploads/${publishedImage.name}`);

                publishedImage.previewElement.classList.add('dz-success', 'dz-complete');
            }
            position = arrayList.length;
        }
    },
});

dropzone.on("success", function (file, response) {
    firstUpload.push(file.name);
    arrayNames.push(response.image);
    if(arrayList.length > 0) {
        arrayList.push(response.image);
        document.querySelector('[name="image[]"]').value = arrayList;
        route = 0;
    }else{
        document.querySelector('[name="image[]"]').value = arrayNames;
        route = 1;
    }
});

dropzone.on("removedfile", function (file) {
    if(firstUpload.length > 0 && route === 1) {
        for(let i=0; i < firstUpload.length; i++) {
            if(file.name === firstUpload[i]){
                $.ajax({
                    url:"/uploads/delete.php",
                    type: "POST",
                    data: {'name' : arrayNames[i]}
                })
                firstUpload.splice(i, 1);
                arrayNames.splice(i, 1);
            }
        }
        document.querySelector('[name="image[]"]').value = arrayNames;

    } if(arrayList.length > 0) {
        for(let i=0; i < arrayList.length; i++) {
            if(file.name === arrayList[i]){
                $.ajax({
                    url:"/uploads/delete.php",
                    type: "POST",
                    data: {'name' : arrayList[i]}
                })
                arrayList.splice(i, 1);
                position--;
            }

            if(file.name === firstUpload[i]){
                $.ajax({
                    url:"/uploads/delete.php",
                    type: "POST",
                    data: {'name' : arrayList[i+position]}
                })
                arrayList.splice(i+position, 1);
            }
        }
        document.querySelector('[name="image[]"]').value = arrayList;
    }
});

dropzone.on("maxfilesexceeded", function(file) {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "You can only upload five images!",
    });
    this.removeFile(file);
});



