$( document ).ready(function() {
    let star = $(".streamer-star");

    star.click(function(e){
        e.preventDefault();
       
        streamerId = $(this).attr('id');
       
        $.ajax({
            url: 'streamerLike.php',
            type: "post",
            data: "streamerId=" + streamerId,
            success: function (html) {
            }
        });


    });
});
