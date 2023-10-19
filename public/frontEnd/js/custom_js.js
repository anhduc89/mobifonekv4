
let linkShare = '';

function copyToClipboard() {
    // Get the text field
    var copyText = document.getElementById("linkShare");

    // Select the text field
    copyText.select();
    // copyText.setSelectionRange(0, 99999); // For mobile devices

     // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    alert("Copied the text: " + copyText.value);
  }


$(document).ready(function(){
    linkShare = $('#linkShare').val();



    $('#shareWithFb').click(function () {
        window.open("https://www.facebook.com/sharer/sharer.php?u=" + linkShare, 'facebook-share-dialog', "width=626, height=436");
    });

    $('#shareWithTwitter').click(function () {
        window.open("https://twitter.com/intent/tweet?url=" + linkShare + '&text=' + linkShare);
    });

    $(document).on('click', '#copyToClipboard', function () {
        copyToClipboard();
    });
});
