<div id="dropzone-wrapper">
    <div class="kt-dropzone dropzone m-dropzone--primary kt-margin-b-20" action="inc/api/dropzone/upload.php" id="photo-dropzone">
        <div class="kt-dropzone__msg dz-message needsclick">
            <h3 class="kt-dropzone__msg-title">Drop files here or click to upload.</h3>
            <span class="kt-dropzone__msg-desc">Upload up to 10 files</span>
        </div>
    </div>
    <input id="uploaded-photos" data-parsley-error-message="Client Uploaded Images" name="uploaded_photos" type="hidden"
           value="{{!empty($model) ? json_encode($model->photos()->pluck('photos.id')) : '[]'}}">
</div>