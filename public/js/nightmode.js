$( document ).ready(function() {

    // send nightmode clear data to ajax/nightmode.php

    let nightmode = $("#nightmode");
    let bodyClass = $("body");

    nightmode.click(function(){
        bodyClass.toggleClass("light-theme dark-theme");
        let bodyVar = bodyClass.attr('class');
        $.ajax({
            url: URL + 'ajax/ajaxnightmode',
            type: "post",
            data: "modus=" + bodyVar,
            success: function (html) {
            }
        });


    });
});