$(document).ready(function(){


  // scroll to position


  // buttons
  $(".scroll-to").click(function() {
      $('html, body').animate({
          scrollTop: $(".scroll-top").offset().top
      }, 600);
  });




});


