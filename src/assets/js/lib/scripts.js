$ = jQuery.noConflict();

$(document).ready(function(){
  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
        $('header').addClass('shrink');
    }
    else{
        $('header').removeClass('shrink');
    }
  });
});
