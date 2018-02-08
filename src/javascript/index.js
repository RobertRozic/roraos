$(document).ready(function(){

    //Navigation
    $('html').click(function() {
        if($(window).width() < 768){
            $('nav .collapse').collapse('hide');
        }
    });

    $('.navbar-nav a').click(function(){
        if($(window).width() < 768){
            $('.navbar-toggler').click();
        }
    });

    // Smoooth scroll
    $(function() {
        $('.nav-link').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 60
            }, 1000);
                return false;
            }
            }
        });
    });

    //Transparent navbar
    function checkScroll(){
        var startY = $('#myNavbar').height();
        if($(window).scrollTop() > startY){
            $('#myNavbar').addClass("scrolled");
        } else {
            $('#myNavbar').removeClass("scrolled");
        }
    }

    $(window).on("scroll load resize", function(){
        checkScroll();
    });

    $('.logo').click(function(){
        if(!$(this).is(':animated')){
            $('#formula')[0].play();
            var offset = $(this).offset();
            var originLeft = offset.left;
            var screenWidth = $(window).width();
            $(this).animate({'margin-right' : '400px'}, 800, function() {
                $(this).animate({'margin-left': screenWidth + originLeft, 'margin-right' : 0}, 400, function() {
                    $(this).css('margin-left', 0);
                    $(this).css('margin-right', screenWidth + originLeft);
                    $(this).animate({'margin-left' : 20, 'margin-right' : 20}, 400);
                })
            });
        }
    });

    //Popover Tehnologije

    $('.popoverData').popover();
    $('.popoverOption').popover({ trigger: "hover" });

});
            
