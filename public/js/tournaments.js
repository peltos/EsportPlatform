$( document ).ready(function() {

    // show the team screen when clicked on the team icon
    let itemTeams = $(".slider-item--teams");
    let switchIconsTeams = $(".switch-icons");

    itemTeams.click(function(){
        $(this).parent(switchIconsTeams).next().toggleClass("teams");
        $(this).parent(switchIconsTeams).next().next().removeClass("match");
    });

    // show the tournaments screen when clicked on the tournaments icon

    let itemTournaments = $(".slider-item--info");
    let switchIconsTournaments = $(".switch-icons");

    itemTournaments.click(function(){
        $(this).parent(switchIconsTournaments).next().next().toggleClass("match");
        $(this).parent(switchIconsTournaments).next().removeClass("teams");
    });
});
