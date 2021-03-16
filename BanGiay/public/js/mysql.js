$(".menu1").next('ul').toggle();

$(".menu1").click(function(event) {
	$(this).next("ul").toggle(500);
});

$(".navbar-header").click(function(event) { 
	$(".keothamenu").toggleClass("hienmenu");
    return false;
    
});



