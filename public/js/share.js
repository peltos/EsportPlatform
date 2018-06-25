$( document ).ready(function() {

    // When you click on the share icon. Show share windows

    let item = $(".streamer--item__share");
    let social = $(".streamer--item__social");

    item.click(function(){
        $(this).siblings(social).toggleClass("social");
    });
});