//  ====================================================================
//	Theme Name: Moroko - Creative Bootstrap Responsive Template
//	Theme URI: http://themeforest.net/user/responsiveexperts
//	Description: This javascript file is using as a settings file. This file includes the sub scripts for the javascripts used in this template.
//	Version: 1.0
//	Author: Responsive Experts
//	Author URI: http://themeforest.net/user/responsiveexperts
//	Tags:
//  ====================================================================

//	TABLE OF CONTENTS
//	---------------------------
//	 01. Preloader
//	 02. Scroll To Top
//   03. Adding fixed position to header
//	 04. Menu Toggle
//	 05. Accordion
//	 06. Fancy Box
//   07. Mobile Menu Side Panel
//   08. Mini Grid
//  ====================================================================


(function() {
	"use strict";
	
	// -------------------- 01. Preloader ---------------------
	// --------------------------------------------------------

	$(window).load(function() {
		$("#loader").fadeOut();
		$("#mask").delay(1000).fadeOut("slow");
	});
	
	// ------------------- 02. Scroll To Top ------------------
	// --------------------------------------------------------
	
	$(function() {
		$('a[href*=#]:not([href=#])').on('click',function() {
			$('.menu-cont li a').parent().removeClass('active');
			$(this).parent().addClass('active');
			if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
	
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
			
		});
	});
	
	// --------- 03. Adding fixed position to header ---------- 
	// --------------------------------------------------------
	
	$(document).on('scroll',function() {
		var header_area = $('.header-area');
		if ($(document).scrollTop() >= 1) {
		  header_area.addClass('navbar-fixed-top');
		} else {
		  header_area.removeClass('navbar-fixed-top');
		}
	});
	
	// -------------------- 04. Menu Toggle -------------------
	// --------------------------------------------------------
	 

    $(document).ready(function() {
	 var menu = $('.menu');
      $('#menu-toggle').on('click',function() {
            menu.slideToggle("slow");
			menu.toggleClass('visible-menu');
          
		});
		// -------------------- 05. Accordion --------------------
		function close_accordion_section() {
			jQuery('.accordion .accordion-section-title').removeClass('active');
			jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
		}
		jQuery('.accordion-section-title').on('click',function(e) {
			// Grab current anchor value
			var currentAttrValue = jQuery(this).attr('href');
	
			if(jQuery(e.target).is('.active')) {
				close_accordion_section();
			}else {
				close_accordion_section();
	
				// Add active class to section title
				jQuery(this).addClass('active');
				// Open up the hidden content panel
				jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
			}
	
			e.preventDefault();
		  });
	// -------------------- 06. Fancy Box ---------------------
			$('.fancybox').fancybox();
	// --------------------------------------------------------
    });
	// -------------------- 07. Mobile Menu Side Panel --------
	// --------------------------------------------------------
	
	$(function(){
  		var menuwidth  = 240; // pixel value for sliding menu width
  		var menuspeed  = 400; // milliseconds for sliding menu animation time
  
  		var $bdy       = $('body');
  		var $container = $('body');
  		var $burger    = $('#side-panel-menu');
 	 	var negwidth   = "-"+menuwidth+"px";
  		var poswidth   = menuwidth+"px";
  
  		$('#mob-menu').on('click',function(e){
    	if($bdy.hasClass('openmenu')) {
      	jsAnimateMenu('close');
    	} else {
      	jsAnimateMenu('open');
    	}
  	 });
  
 	 $('.overlay').on('click', function(e){
    		if($bdy.hasClass('openmenu')) {
     		jsAnimateMenu('close');
   			}
  	 });
  
  	 $('a[href$="#"]').on('click', function(e){
    		e.preventDefault();
  	 });
  
  	 function jsAnimateMenu(tog) {
   	 	if(tog == 'open') {
      		$bdy.addClass('openmenu');
      
      		$container.animate({marginLeft: negwidth, marginRight: poswidth}, menuspeed);
     	 	$burger.animate({width: poswidth}, menuspeed);
      		$('.overlay').animate({Right: poswidth}, menuspeed);
    		}
    
     if(tog == 'close') {
      		$bdy.removeClass('openmenu');
      
     	 	$container.animate({marginLeft: "0", marginRight: "0"}, menuspeed);
      		$burger.animate({width: "0"}, menuspeed);
      		$('.overlay').animate({Right: "0"}, menuspeed);
   		 }
  		}
	 });
    
	
	// -------------------- 06. Fancy Box ---------------------
	// --------------------------------------------------------
	    $(".fancybox-with-effects").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,
				openEffect : 'none',
				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
		});
		
	// -------------------- 08. Mini Grid -------------------
	// --------------------------------------------------------
	    (function(){

        function grid() {
          minigrid({
            container: '.blog-items-area ',
            item: '.blog-items-area > div ',
            gutter:3
          });
        }

        window.addEventListener('resize', function(){
          grid();
        });

        grid();

      })();

})(jQuery);


