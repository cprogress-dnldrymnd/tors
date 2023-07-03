//  ====================================================================
//	Theme Name: Moroko - Creative Bootstrap Responsive Template
//	Theme URI: http://themeforest.net/user/responsiveexperts
//	Description: This javascript file is using as a settings file. This file includes the sub scripts for the 
//  javascripts used in this template.
//	Version: 1.0
//	Author: Responsive Experts
//	Author URI: http://themeforest.net/user/responsiveexperts
//	Tags:
//  ====================================================================

//	TABLE OF CONTENTS
//	---------------------------
//	 01. Banner Slider Settings(flex-slider-settings)

//  ====================================================================

	
	
	

    $(document).ready(function() {
     
      var owl = $("#owl-demo-portfolio");
     
      owl.owlCarousel({
		   items:4,
          itemsCustom : [
            [0, 1],
            [480,1],
            [600, 2],
            [700, 3],
            [1000, 4],
            [1200, 4],
            [1400, 4],
            [1600, 4]
          ],
          navigation : true,
		  autoPlay : false,
		  singleItem : false,
		  scrollPerPage :true
      });
     
    });
	$(document).ready(function() {
     
      var owl = $("#owl-demo-testimonial");
     
      owl.owlCarousel({
         
          itemsCustom : [
            [0, 1],
            [480,1],
            [600, 2],
            [700, 2],
            [1000, 2],
            [1200, 2],
            [1400, 2],
            [1600, 2]
          ],
          navigation : true,
		  autoPlay : true,
        stopOnHover : true
     
      });
     
    });




