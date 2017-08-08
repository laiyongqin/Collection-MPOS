$(document).ready(function(){
	
  $(".con5").click(function(){
  $(".frame2 .one").delay(0).animate({bottom:'46px',opacity:'1'},"500");
  $(".frame2 .two").delay(200).animate({bottom:'106px',opacity:'1'},"500");
  $(".frame2 .three").delay(400).animate({bottom:'166px',opacity:'1'},"500");
  $(".frame2 .four").delay(600).animate({bottom:'226px',opacity:'1'},"500");
  });
  
  $(".close").click(function(){
  $(".frame2 .one").delay(0).animate({bottom:'0',opacity:'1'},"500");
  $(".frame2 .two").delay(200).animate({bottom:'0',opacity:'1'},"500");
  $(".frame2 .three").delay(400).animate({bottom:'0',opacity:'1'},"500");
  $(".frame2 .four").delay(600).animate({bottom:'0',opacity:'1'},"500");
  });
  
});