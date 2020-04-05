$('.summernote').summernote({
    height: 150,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        /*['fontname', ['fontname']],*/
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['undo', 'redo', 'fullscreen','codeview']]
    ],
});
$('.mini-summernote').summernote({
    height: 150,
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['fullscreen','codeview']]
    ],
});