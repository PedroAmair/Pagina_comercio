import 'flowbite';
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Upload your file here",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Delete file',
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
        if(document.querySelector('[name="image"]').value.trim()) {
            const publishedImage = {}
            publishedImage.size = 124;
            publishedImage.name = document.querySelector('[name="image"]').value;

            this.options.addedfile.call(this, publishedImage);
            this.options.thumbnail.call(this, publishedImage, `/uploads/${publishedImage.name}`);

            publishedImage.previewElement.classList.add('dz-success', 'dz-complete');
        }
    },
});

dropzone.on("success", function (file, response) {
    document.querySelector('[name="image"]').value = response.image;
});

dropzone.on("removedfile", function () {
    document.querySelector('[name="image"]').value = "";
});



