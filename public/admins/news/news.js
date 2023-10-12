$(function () {
    $(".tag-news").select2({
        tags: true,
        tokenSeparators: [','],
        placeholder: 'Nhập tags cho bài viết',
        alllowClear: true
    })
});
