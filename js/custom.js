$(document).ready(function(){   
$('ul.main-menu li').hover(function(){   
$(this).find('ul:first').slideDown(200);//显示二级菜单，括号中的数字表示下拉菜单完全显示出来需要200毫秒。   
$(this).addClass("hover");   
},function(){   
$(this).find('ul').css('display','none');   
$(this).removeClass("hover");   
});   
function hide_submenu(){   
$('ul.main-menu li').find('ul').css('display','none');   
}   
$('ul.main-menu li li:has(ul)').find("a:first").append(" &raquo; ");   
document.onclick = hide_submenu;   
});
$(document).ready(function() {
$('#nav li').hover(function() {
$('ul', this).slideDown(300)
},
function() {
$('ul', this).slideUp(300)
});
});

$(window).load(function() {
$('#featured').orbit({
     animation: 'horizontal-push',                  // fade, horizontal-slide, vertical-slide, horizontal-push
     animationSpeed: 800,                // how fast animtions are
     timer: true, 			 // true or false to have the timer
     advanceSpeed: 4000, 		 // if timer is enabled, time between transitions 
     pauseOnHover: false, 		 // if you hover pauses the slider
     startClockOnMouseOut: false, 	 // if clock should start on MouseOut
     startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
     directionalNav: true, 		 // manual advancing directional navs
     captions: true, 			 // do you want captions?
     captionAnimation: 'fade', 		 // fade, slideOpen, none
     captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
     bullets: true,			 // true or false to activate the bullet navigation
     bulletThumbs: false,		 // thumbnails for the bullets
     bulletThumbLocation: '/img',		 // location from this file where thumbs will be
     afterSlideChange: function(){} 	 // empty function 
});
});