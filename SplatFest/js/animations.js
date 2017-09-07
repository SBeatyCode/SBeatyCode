/*

**********************************************************
    * AUTHOR: STEPHEN BEATY

    *WEBSITE: SBEATY CODE

    * Some elements of this code are from StackOverflow that I found while researching, which I took and
    * modified for my own needs and uses. 


        *****NOTE*****
        
          Splatoon, Nintendo, Inklings, and all related terms and images belong to Nintendo. This is simply a fansite I made to practice coding webpages using Javascript and CSS animations

**********************************************************
          
*/


$(document).ready(function() {
    
    var positionChanged = false;
    
    $(window).on('resize', function() {
/*
    change the position of the Inklings to the default position when the window is resized, so that things don't look weird
    in mobile or the image doesn't jump around all weirdly while the page is being resized in general 
*/
        
        if(positionChanged) {
            $('#inklingBoy').css('left', '-=50vw');
            $('#inklingGirl').css('left', '+=50vw');
        }
        positionChanged = false;
    });
    
    $(window).scroll(function () {
//getting the height of the image divs, the window height, and the trigger distance
        
        var topInklingBoyHeight = $('#inklingBoy').height();
        var topInklingGirlHeight = $('#inklingGirl').height();
        var viewPortSize = $(window).height();

        var triggerAt = 250;
        var inklingBoyTriggerHeight = (topInklingBoyHeight - viewPortSize) + triggerAt;
        var inklingGirlTriggerHeight = (topInklingGirlHeight - viewPortSize) + triggerAt;

        if ($(window).scrollTop() >= inklingBoyTriggerHeight) {
        //if the window is 1000px or bigger, make an animation of a fade in and movement, else just a fade-in
            if($(window).width() >= 1000) {
                $('#inklingBoy').css('visibility', 'visible').hide().fadeIn(1300);
                $(this).off('scroll');
                $('#inklingBoy').animate({
                    left: "+=55vw"
                });
                positionChanged = true;
            } else {
        //Don't animate for mobile, keep the image centered
                
                $('#inklingBoy').css('visibility', 'visible').hide().fadeIn(1300);
                $(this).off('scroll');
            }
        }
        
        if($(window).scrollTop() >= inklingGirlTriggerHeight) {
            if($(window).width() >= 1000) {
                $('#inklingGirl').css('visibility', 'visible').hide().fadeIn(2200);
                $(this).off('scroll');
                $('#inklingGirl').animate({
                    left: "-=50vw"
                });
                positionChanged = true;
            } else {
                $('#inklingGirl').css('visibility', 'visible').hide().fadeIn(2200);
                $(this).off('scroll');
            }
        }
    });

});