$( document ).ready(function() {

    // send followed data to ajax/followed.php

    let star = $(".streamer-star");

    star.click(function(e){
        e.preventDefault();
        $(this).toggleClass("active");
        streamerId = $(this).attr('id');
        isActive = $(this).hasClass("active");

        $.ajax({
            url: URL + 'ajax/ajaxfollow',
            type: "post",
            data: "streamerId=" + streamerId + "&isActive=" + isActive,
            success: function (html) {
            }
        });


    });
});
