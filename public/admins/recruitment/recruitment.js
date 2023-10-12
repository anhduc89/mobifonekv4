$(function () {

    var route_prefix = "/filemanager";

    let options = {
        height: 300,
        mediaEmbed: {
            previewsInData: true
        },
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}', // "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}"
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}', //"{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        // filebrowserUploadMethod: 'form'
    };

    CKEDITOR.replace('contents', options );
});
