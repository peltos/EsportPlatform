$( document ).ready(function() {

    // when you click on the search icon. show searchbar

    let searchIcon = $("#search-icon");
    let searchbar = $("#searchbar");

    searchIcon.click(function(){
        $(this).toggleClass("hidden");
        $(searchbar).toggleClass("hidden");
    });
});