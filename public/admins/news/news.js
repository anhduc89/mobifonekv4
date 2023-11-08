$(function () {

    $(".tag-news").select2({
        tags: true,
        tokenSeparators: [','],
        placeholder: 'Nhập tags cho bài viết',
        alllowClear: true
    })
});

function openPopupImg2(id) {
    CKFinder.popup({
        chooseFiles: true,
        onInit: function(finder) {
            finder.on('files:choose', function(evt) {
                var file = evt.data.files.first();
                console.log(evt.data.files);

                document.getElementById(id).value = file.getUrl();

            });
            finder.on('file:choose:resizedImage', function(evt) {
                document.getElementById(id).value = evt.data.resizedUrl;
            });
        }
    });
}
