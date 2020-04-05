<script>
    /*Dropzone.autoDiscover = false;*/
    var dropzoneWrapper = $('#dropzone-wrapper');
    var photosElement = dropzoneWrapper.find('#uploaded-photos');
    var uploadedPhotos = photosElement.val() ? $.parseJSON(photosElement.val()) : [];
    Dropzone.options.photoDropzone = {
        url: "{{route('api.photos.upload')}}",
        params: {
            _token: "{{csrf_token()}}"
        },
        paramName: "files", // The name that will be used to transfer the file
        maxFiles: 10,
        uploadMultiple: true,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        autoProcessQueue: true,
        parallelUploads: 100,
        acceptedFiles: ".png,.jpg,.jpeg",
        init: function () {
            this.on("sendingmultiple", function () {
                dropzoneWrapper.closest('form').find('button[type="submit"],input[type="submit"]').prop('disabled', true);
            });
            this.on("successmultiple", function (files, response) {
                var failedMessage = null;

                for (var i = 0; i < files.length; i++) {
                    if (!response[i]) {
                        failedMessage = 'Failed, please try another image.';
                    } else {
                        files[i].photoId = response[i];
                        uploadedPhotos.push(response[i]);
                    }
                }
                if (failedMessage) alert(failedMessage);

                photosElement.val(JSON.stringify(uploadedPhotos));
                dropzoneWrapper.closest('form').find('button[type="submit"],input[type="submit"]').prop('disabled', false);
            });
            this.on("errormultiple", function (files, response) {
                var message = response.message ? response.message : response;
                alert(message);
                dropzoneWrapper.closest('form').find('button[type="submit"],input[type="submit"]').prop('disabled', false);
            });
            this.on("removedfile", function (file) {

                for (var i = 0; i < uploadedPhotos.length; i++) {
                    if (uploadedPhotos[i] === file.photoId) {
                        uploadedPhotos.splice(i, 1);
                    }
                }
                photosElement.val(JSON.stringify(uploadedPhotos));
            });
        }

    };
</script>