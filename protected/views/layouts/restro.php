<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="rgmnjisz_ErMdrQPJ7f7cHzDVMX_T5CQzQtH2UgPm88" />
    <title>Aqua Vista Restro 'n' Bar, August Lake Resort</title>
    <meta name="description" content="">
    <meta name="keywords" content="Aqua Vista Restro 'n' Bar, Aqua, Vista, Restro, Bar, augustlakeresort, hotels in pokhara, august, lake, resort, hotel, pokhara, nepal, lakeside, pame">
    <meta name="description" content="Aqua Vista Restro 'n' Bar, August Lake Resort">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon
    <link rel="shortcut icon" href="images/favicon.ico">-->

    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Fontello CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/fonts/fontello/css/fontello.css" rel="stylesheet">

    <!-- Plugins -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/rs-plugin/css/extralayers.css" media="screen" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/animations.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/flexslider1.css" />

    <!--  core CSS file -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/style.css" rel="stylesheet">

    <!-- Color Scheme (In order to change the color scheme, replace the red.css with the color scheme that you prefer)-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/skins/light_blue.css" rel="stylesheet">

    <!-- Custom css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/custom.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/one-page.css" rel="stylesheet">
</head>

<!-- body classes:
        "boxed": boxed layout mode e.g. <body class="boxed">
        "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1">
-->
<body class="front">
<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<!-- page wrapper start -->
<!-- ================ -->
<?php echo $content; ?>
<!-- page-wrapper end -->

<!-- JavaScript files placed at the end of the document so the pages load faster
================================================== -->
<!-- Jquery and Bootstap core js files -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/bootstrap/js/bootstrap.min.js"></script>

<!-- Modernizr javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/modernizr.js"></script>


<!-- Isotope javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/isotope/isotope.pkgd.min.js"></script>

<!-- Owl carousel javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/owl-carousel/owl.carousel.js"></script>

<!-- Magnific Popup javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Appear javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.appear.js"></script>

<!-- Count To javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.countTo.js"></script>

<!-- Parallax javascript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.parallax-1.1.3.js"></script>

<!-- Contact form -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery.flexslider1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery.easing.js"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/template.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" >
    $(window).load(function() {
        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: true,
            animationLoop: false,
            slideshow: true
        });
    });
    //config
    $float_speed=1500; //milliseconds
    $float_easing="easeOutQuint";
    $menu_fade_speed=500; //milliseconds
    $closed_menu_opacity=0.75;

    //cache vars
    $fl_menu=$("#fl_menu");
    $fl_menu_menu=$("#fl_menu .menu");
    $fl_menu_label=$("#fl_menu .label");

    $(window).load(function() {
        menuPosition=$('#fl_menu').position().top;
        FloatMenu();
        $fl_menu.hover(
            function(){ //mouse over
                $fl_menu_label.fadeTo($menu_fade_speed, 1);
                $fl_menu_menu.fadeIn($menu_fade_speed);
            },
            function(){ //mouse out
                $fl_menu_label.fadeTo($menu_fade_speed, $closed_menu_opacity);
                $fl_menu_menu.fadeOut($menu_fade_speed);
            }
        );
    });

    $(window).scroll(function () {
        FloatMenu();
    });

    function FloatMenu(){
        var scrollAmount=$(document).scrollTop();
        var newPosition=menuPosition+scrollAmount;
        if($(window).height()<$fl_menu.height()+$fl_menu_menu.height()){
            $fl_menu.css("top",menuPosition);
        } else {
            $fl_menu.stop().animate({top: newPosition}, $float_speed, $float_easing);
        }
    }
</script>

</body>
</html>
