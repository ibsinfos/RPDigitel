<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $template['title']; ?></title>
        <!-- Meta -->
        <meta name="keywords" content="" />
        <meta name="author" content="">
        <meta name="robots" content="" />
        <meta name="description" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <!-- Web Fonts  -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800,600|Lato:400,300,700,900' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- stylesheets -->
        <link rel="stylesheet" media="screen" href="<?php echo frontend_asset_url() ?>js/bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo frontend_asset_url() ?>js/mainmenu/menu-2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo frontend_asset_url() ?>css/theme-default.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo frontend_asset_url() ?>css/theme-style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo frontend_asset_url() ?>css/shortcodes.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo frontend_asset_url() ?>css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo frontend_asset_url() ?>js/masterslider/style/masterslider.css" />
        <link href="<?php echo frontend_asset_url() ?>js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo frontend_asset_url() ?>js/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="<?php echo frontend_asset_url() ?>js/bootstrap/css/bootstrap-combined.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo frontend_asset_url() ?>js/tabs/assets/css/responsive-tabs.css" />
        <!--Gallery-->
        <link href='<?php echo frontend_asset_url() ?>js/simplelightbox/simplelightbox.min.css' rel='stylesheet' type='text/css'>
        <!--<link href='js/simplelightbox/demo.css' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" media="screen" href="<?php echo frontend_asset_url() ?>css/responsive-style.css" type="text/css" />
        <link rel="stylesheet" media="screen" href="<?php echo frontend_asset_url() ?>css/custom.css" type="text/css" />
         <link rel="stylesheet" type="text/css" href="<?php echo frontend_asset_url() ?>js/smart-forms/smart-forms.css">
        <script type="text/javascript">
            var base_url = '<?php echo base_url() ?>';
            var asset_url = '<?php echo frontend_asset_url() ?>';
            var vpage = '<?php echo $page; ?>';

        </script>
    </head>
    <body>



        
        <div class="site_wrapper font-style2">
            <?php
            if (isset($template['partials']['header'])) {
                echo $template['partials']['header'];
            }
            ?>
            <?php echo $template['body']; ?>

            
            <?php
        if (isset($template['partials']['footer'])) {
            echo $template['partials']['footer'];
        }
        ?>
        </div>
        <!-- ========== Js Files ========== --> 
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/universal/jquery.js"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/mainmenu/customeUI.js"></script>
        <script src="<?php echo frontend_asset_url() ?>js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script> 
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/tabs/smk-accordion.js"></script>
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/tabs/custom.js"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/mainmenu/jquery.sticky.js"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/masterslider/masterslider.min.js"></script> 
        <script type="text/javascript">
            (function ($) {
                "use strict";
                var slider = new MasterSlider();
                // adds Arrows navigation control to the slider.
                slider.control('arrows');
                slider.control('bullets');

                slider.setup('masterslider', {
                    width: 1600, // slider standard width
                    height: 600, // slider standard height
                    space: 0,
                    speed: 45,
                    layout: 'fullwidth',
                    loop: true,
                    preload: 0,
                    autoplay: true,
                    view: "parallaxMask"
                });
            })(jQuery);
        </script> 
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/ytplayer/jquery.mb.YTPlayer.js"></script> 
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/ytplayer/elementvideo-custom.js"></script> 
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/ytplayer/play-pause-btn.js"></script>
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/cubeportfolio/jquery.cubeportfolio.min.js"></script> 
        <script type="text/javascript" src="<?php echo frontend_asset_url() ?>js/cubeportfolio/main.js"></script>
        <script src="<?php echo frontend_asset_url() ?>js/animations/js/animations.min.js" type="text/javascript"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/animations/js/appear.min.js" type="text/javascript"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/scrolltotop/totop.js"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/owl-carousel/owl.carousel.js"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/owl-carousel/custom.js"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> 
        <!--<script src="<?php echo frontend_asset_url() ?>js/style-swicher/style-swicher.js"></script>--> 
        <script src="<?php echo frontend_asset_url() ?>js/style-swicher/custom.js"></script> 
        <script src="<?php echo frontend_asset_url() ?>js/scripts/functions.js" type="text/javascript"></script>
        <script>
            $(".service_box1").mouseover(function () {
                $(".service_box .icon1").css({
                    "background-image": "url(<?php echo frontend_asset_url() ?>images/Icon1.png)",
                    "background-size": "100%"
                });
            });
            $(".service_box1").mouseout(function () {
                $(".service_box .icon1").css({
                    "background-image": "url(<?php echo frontend_asset_url() ?>images/Icon1-white.png)",
                    "background-size": "100%"
                });
            });
            $(".service_box2").mouseover(function () {
                $(".service_box .icon2").css({
                    "background-image": "url(<?php echo frontend_asset_url() ?>images/Icon2.png)",
                    "background-size": "100%"
                });
            });
            $(".service_box2").mouseout(function () {
                $(".service_box .icon2").css({
                    "background-image": "url(<?php echo frontend_asset_url() ?>images/Icon2-white.png)",
                    "background-size": "100%"
                });
            });
            $(".service_box3").mouseover(function () {
                $(".service_box .icon3").css({
                    "background-image": "url(<?php echo frontend_asset_url() ?>images/Icon3.png)",
                    "background-size": "100%"
                });
            });
            $(".service_box3").mouseout(function () {
                $(".service_box .icon3").css({
                    "background-image": "url(<?php echo frontend_asset_url() ?>images/Icon3-white.png)",
                    "background-size": "100%"
                });
            });

        </script>
        <script type="text/javascript">
        (function($) {
            "use strict";
            var slider = new MasterSlider();
            // adds Arrows navigation control to the slider.
            slider.control('arrows');
            slider.control('bullets');

            slider.setup('masterslider', {
                width: 1600, // slider standard width
                height: 600, // slider standard height
                space: 0,
                speed: 45,
                layout: 'fullwidth',
                loop: true,
                preload: 0,
                autoplay: true,
                view: "parallaxMask"
            });
        })(jQuery);
    </script>
	<script type="text/javascript">
	$(window).load(function(){	
		$(".done").click(function(){
			var this_li_ind = $(this).parent().parent("li").index();
			if($('.payment-wizard li').hasClass("jump-here")){
				$(this).parent().parent("li").removeClass("active").addClass("completed");
				$(this).parent(".wizard-content").slideUp();
				$('.payment-wizard li.jump-here').removeClass("jump-here");
			}else{
				$(this).parent().parent("li").removeClass("active").addClass("completed");
				$(this).parent(".wizard-content").slideUp();
				$(this).parent().parent("li").next("li:not('.completed')").addClass('active').children('.wizard-content').slideDown();
			}
		});
		
		$('.payment-wizard li .wizard-heading').click(function(){
			if($(this).parent().hasClass('completed')){
				var this_li_ind = $(this).parent("li").index();		
				var li_ind = $('.payment-wizard li.active').index();
				if(this_li_ind < li_ind){
					$('.payment-wizard li.active').addClass("jump-here");
				}
				$(this).parent().addClass('active').removeClass('completed');
				$(this).siblings('.wizard-content').slideDown();
			}
		});
	})
	</script>
    </body>
</html>

