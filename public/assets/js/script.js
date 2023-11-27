$(document).ready(function() {
    $('#inicial').load("inicial");

    $(".links").click(function(event) {
        event.preventDefault();
        $('#inicial').load($(event.target).attr("data"));
    });

    $('#myCarousel').carousel({
        interval: 3000 
    });
});