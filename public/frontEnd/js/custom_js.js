
let linkShare = '';

$(document).ready(function(){
    linkShare = $('#linkShare').val();

    $('#shareWithFb').click(function () {
        window.open("https://www.facebook.com/sharer/sharer.php?u=" + linkShare, 'facebook-share-dialog', "width=626, height=436");
    });

    $('#shareWithTwitter').click(function () {
        window.open("https://twitter.com/intent/tweet?url=" + linkShare + '&text=' + linkShare);
    });

    var clipboard = new ClipboardJS('#copyToClipboard', {
        text: function() {
            return linkShare; //document.querySelector('#copyText').value;
        }
    });

    clipboard.on('success', function(e) {
        alert('Đã sao chép: ' + e.text);
    });

    clipboard.on('error', function(e) {
        alert('Không thể sao chép.');
    });
});


$(window).bind('scroll', function () {

    const elmnt = document.getElementById("session_detail").offsetHeight;

    if ($(window).scrollTop() > 150 && $(window).scrollTop() < (elmnt - 200)) {
        document.getElementById("ul_left_sidebar").style.display = 'flex'
    }
    else
    {
        document.getElementById("ul_left_sidebar").style.display = 'none'
    }
    });