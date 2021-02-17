$(document).ready(function(){$("img").mousedown(function(){return false;});heightBody();$(window).resize(function(event){heightBody();});function heightBody(){$('body').height($(window).innerHeight());}
function toggleNav(){if($("nav").is(":visible")){$("nav").fadeOut();$("header").delay(2000).removeClass("open-nav");$(".btn-mobile").removeClass("open");}
else{$(".btn-mobile").addClass("open");$("header").addClass("open-nav");$("nav").fadeIn();}}
$(".btn, .btn-mobile").click(function(event){event.preventDefault();toggleNav();});});