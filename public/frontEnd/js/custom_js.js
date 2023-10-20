
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

    var copied = document.getElementById("Copied");

    function turnOffCopied() {
        copied.style.display = 'none';
    }
      
    clipboard.on('success', function(e) {
        copied.style.display = 'flex';
        copied.style.backgroundColor = 'green';
        copied.innerHTML = 'Đã sao chép';
        setTimeout(turnOffCopied, 3000)
        // alert('Đã sao chép: ' + e.text);
    });

    clipboard.on('error', function(e) {
        copied.style.display = 'flex';
        copied.style.backgroundColor = 'Red';
        copied.innerText = 'Không thể sao chép';
        setTimeout(turnOffCopied, 3000)
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