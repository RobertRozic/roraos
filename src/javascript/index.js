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
					scrollTop: target.offset().top
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

	$('.logo').click(
   		function(){
   			$('#formula')[0].play();
        	var offset = $(this).offset();
        	var originLeft = offset.left;
        	$(this).animate(
            {
             	'right' : '400px'
                
            }, 800, function() {
                $(this).animate({
                    'left': originLeft
                   
            }, 400,function() {
            	$(this).animate({            	
            		'left' : '0px'
            	}, 0)
            } )

                      
            });
			});
			});


/*
        $('.logo').click(
   		function(){
        	var offset = $(this).offset();
        	var originLeft = offset.left;
        	var originTop = offset.top;
        	$(this).animate(
            {
             	'right' : '400px'
                
            }, 1200, function() {
                $(this).animate({
                    'left': originLeft
                   
            }, 500)

             });
                    });
        
    
*/
    

      





			
		// body...


