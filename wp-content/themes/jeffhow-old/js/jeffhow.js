// JavaScript

//document.getElementById("js_test").innerHTML="JS Success";
//jQuery("#jq_test").html("JQ Success");
/**
(function($) {
	$(".course-panel").hover(function(){
	    console.log(this);
	    $('.course-circle', this).animate({backgroundColor:'#ff6117'},500);
	    $('h3', this).animate({fontSize:'36px'},500);
	}, function(){
	    $('.course-circle', this).animate({backgroundColor:'#FFA276'},500);
	    $('h3', this).animate({fontSize:'32px'},500);
	});
})( jQuery );**/

(function($) {
	$(".home-post-link").hover(function(){
		//mouse in
		$(this).parents('.home-outer-post').animate({'padding-right': '50px'},500);
	},function(){
		//mouse out
		$(this).parents('.home-outer-post').animate({'padding-right': '15px'},500);
	});
	
})( jQuery );