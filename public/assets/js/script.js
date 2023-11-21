$(document).ready(function() {
    $('#inicial').load("inicial");

    $(".links").click(function(event) {
        event.preventDefault();
        $('#inicial').load($(event.target).attr("data"));
    });

    $('#carouselExample').carousel({
        interval: 3000 
    });
});