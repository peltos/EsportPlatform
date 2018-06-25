
//This is for the filter function in the streamers page.
function openCity(evt, gameName) {
  //If the value is 'all', you will get all the streamers of all the games. But if the 'all' value is not pressed you will get the game that you have pressed in the filter.
    if(gameName !== 'all'){
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(gameName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    else{
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "block";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
    }
}

$( document ).ready(function() {

    // if on Followed page item is not online. hide it. show it again when clicked on 'All'

    let onlineNav = $("#onlineNav");
    let miscNav = $(".tablinks:not(#onlineNav)");

    onlineNav.click(function(e){
        $(".streamers--item").css( "display", "block" );
        $(".streamers--item:not(.online)").css( "display", "none" );
    });
    miscNav.click(function(e){
        $(".streamers--item").css( "display", "block" );
    });
});
