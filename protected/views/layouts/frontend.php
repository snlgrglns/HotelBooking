<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="google-site-verification" content="rgmnjisz_ErMdrQPJ7f7cHzDVMX_T5CQzQtH2UgPm88" />
    <meta name="language" content="en" />	
    <meta name="keywords" content="augustlakeresort, hotels in pokhara, august, lake, resort, hotel, pokhara, nepal, lakeside, pame">
    <meta name="description" content="August Lake Resort, Best Hotel in Pokhara at reasonable price">

    <title>August Lake Resort, Best Hotel in Pokhara at Reasonable Price</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/ico.ico">
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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/jquery.selectbox.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/flexslider.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/jquery-ui.css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/jquery.bxslider.css" type="text/css" rel="stylesheet" />
    <!-- resort core CSS file -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/style.css" rel="stylesheet">
    <!-- Color Scheme (In order to change the color scheme, replace the red.css with the color scheme that you prefer)-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/skins/light_blue.css" rel="stylesheet">
    <!-- Custom css -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/custom.css" rel="stylesheet">
</head>
<!-- body classes:
			"boxed": boxed layout mode e.g. <body class="boxed">
			"pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1">
	-->
<body class="front">
<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="fa fa-angle-up"></i></div>
<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">
    <!-- header-top start -->
    <!-- ================ -->

    <!-- header-top end -->
    <!-- header start (remove fixed class from header in order to disable fixed navigation mode) -->
    <!-- ================ -->
    <header class="header fixed clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- header-left start -->
                    <!-- ================ -->
                    <div class="header-left clearfix">
                        <?php $logo = Logo::model()->findByAttributes(array('status'=>'1')); ?>
                        <div class="logo">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index">
                                <?php if(!empty($logo)){ ?>
                                    <img id="logo" src="<?php echo Yii::app()->request->baseUrl.'/images/logo/'.$logo->id.'/'.$logo->logo; ?>" alt="resort">
                                <?php } ?>
                            </a>
                        </div>

                    </div>
                    <!-- header-left end -->
                </div>
                <div class="col-md-9">
                    <!-- header-right start -->
                    <!-- ================ -->
                    <div class="header-right clearfix">
                        <!-- main-navigation start -->
                        <!-- ================ -->
                        <?php list($pro, $cont, $act) = explode('/',$_SERVER['REQUEST_URI']); ?>

                        <div class="main-navigation animated">
                            <!-- navbar start -->
                            <!-- ================ -->
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <!-- Toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li <?php if(strtolower($cont.'/'.$act) == 'site/index' or strtolower($cont.'/'.$act) == '' or strtolower($cont.'/'.$act) == 'site'){?>class="active"<?php } ?>><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index">Home</a></li>
                                            <li <?php if(strtolower($cont.'/'.$act) == 'site/about'){?>class="active"<?php } ?>><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/about">About Us</a></li>
                                            <li <?php if(strtolower($cont.'/'.$act) == 'site/services'){?>class="active"<?php } ?>><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/services">Services</a></li>
                                            <li <?php if(strtolower($cont.'/'.$act) == 'site/gallery'){?>class="active"<?php } ?>><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/gallery">Gallery</a></li>
                                            <li <?php if(strtolower($cont.'/'.$act) == 'site/tariff'){?>class="active"<?php } ?>><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/tariff">Tariff</a></li>
                                             <li><a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/restro">Restro</a></li>
                                            <li <?php if(strtolower($cont.'/'.$act) == 'site/contactus'){?>class="active"<?php } ?>><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contactus">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!-- navbar end -->
                        </div>
                        <!-- main-navigation end -->
                    </div>
                    <!-- header-right end -->
                </div>
            </div>
        </div>
    </header>

    <!-- header end -->
    <?php echo $content; ?>
        <div class="social-media">
        <div class="container">
            <div class="row"><div class="col-md-7"><ul class="social-list">
                <li class="facebook"><a target="_blank" href="https://www.facebook.com/augustlakeresort"><i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a target="_blank" href="https://twitter.com/augustresort"><i class="fa fa-twitter"></i></a></li>
                <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                <li class="googleplus"><a target="_blank" href="http://www.googleplus.com"><i class="fa fa-google-plus"></i></a></li>
                
                <li class="instagram"><a target="_blank" href="https://instagram.com/augustlakeresort"><i class="fa fa-instagram"></i></a></li>
                
            </ul></div>
            <div class="col-md-5">
            <ul class="logos pull-right">
            	<li class="tripadvisor"><a target="_blank" href="http://www.tripadvisor.com/Hotel_Review-g293891-d8657132-Reviews-August_Lake_Resort-Pokhara_Gandaki_Zone_Western_Region.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/tripadvisor1.png" alt="tripadvisor"></a></li>
                <li class="agoda"><a target="_blank" href="http://www.be3.com/asia/nepal/pokhara/august_lake_resort.html?cur=USD"><img src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/css/agoda1.png" alt="tripadvisor"></a></li>
                <li class="booking"><a target="_blank" href="http://www.booking.com/hotel/np/august-lake-resort.html?aid=330843;lang=en-us">
Booking<span>.com</span></a></li>
            </ul>
            </div>
            </div>
        </div>
    </div>
    <!-- footer start (Add "light" class to #footer in order to enable light footer) -->
    <!-- ================ -->
    <footer id="footer">
        <!-- .footer start -->
        <!-- ================ -->
        <!--        <div class="footer">-->
        <!--            <div class="container">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-md-6">-->
        <!--                        <div class="footer-content">-->
        <!--                            <div class="logo-footer"><img id="logo-footer" src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/logo_red_footer.png" alt=""></div>-->
        <!--                            <div class="row">-->
        <!--                                <div class="col-sm-6">-->
        <!--                                    <p>Lorem ipsum dolor sit amet, consect tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven.</p>-->
        <!--                                    <ul class="social-links circle">-->
        <!--                                        <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>-->
        <!--                                        <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>-->
        <!--                                        <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>-->
        <!--                                        <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>-->
        <!--                                        <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>-->
        <!--                                    </ul>-->
        <!--                                </div>-->
        <!--                                <div class="col-sm-6">-->
        <!--                                    <ul class="list-icons">-->
        <!--                                        <li><i class="fa fa-map-marker pr-10"></i> One infinity loop, 54100</li>-->
        <!--                                        <li><i class="fa fa-phone pr-10"></i> +00 1234567890</li>-->
        <!--                                        <li><i class="fa fa-fax pr-10"></i> +00 1234567891 </li>-->
        <!--                                        <li><i class="fa fa-envelope-o pr-10"></i> info@idea.com</li>-->
        <!--                                    </ul>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <a href="page-about.html" class="link"><span>Read More</span></a> </div>-->
        <!--                    </div>-->
        <!--                    <div class="space-bottom hidden-lg hidden-xs"></div>-->
        <!--                    <div class="col-sm-6 col-md-2">-->
        <!--                        <div class="footer-content">-->
        <!--                            <h2>Links</h2>-->
        <!--                            <nav>-->
        <!--                                <ul class="nav nav-pills nav-stacked">-->
        <!--                                    <li><a href="index.html">Home</a></li>-->
        <!--                                    <li class="active"><a href="blog-right-sidebar.html">Blog</a></li>-->
        <!--                                    <li><a href="portfolio-3col.html">Portfolio</a></li>-->
        <!--                                    <li><a href="page-about.html">About</a></li>-->
        <!--                                    <li><a href="page-contact.html">Contact</a></li>-->
        <!--                                </ul>-->
        <!--                            </nav>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-6 col-md-3 col-md-offset-1">-->
        <!--                        <div class="footer-content">-->
        <!--                            <h2>Latest Projects</h2>-->
        <!--                            <div class="gallery row">-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-1.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-2.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-3.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-4.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-5.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-6.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-7.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-8.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                                <div class="gallery-item col-xs-4">-->
        <!--                                    <div class="overlay-container"> <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/frontendfiles/images/gallery-9.jpg" alt=""> <a href="portfolio-item.html" class="overlay small"> <i class="fa fa-link"></i> </a> </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="space-bottom hidden-lg hidden-xs"></div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!-- .footer end -->
        <!-- .subfooter start -->
        <!-- ================ -->
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright © 2015 AugustLakeResort. All Rights Reserved</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="navbar navbar-default" role="navigation">
                            <!-- Toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse-2">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index">Home</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/about">About Us</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/services">Services</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/gallery">Gallery</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/tariff">Tariff</a></li>
                                    <li><a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/restro">Restro</a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contactus">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- .subfooter end -->
    </footer>
    <!-- footer end -->
</div>
<!-- page-wrapper end -->
<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
<!-- Jquery and Bootstap core js files -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/bootstrap/js/bootstrap.min.js"></script>
<!-- Modernizr javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/modernizr.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- Isotope javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/isotope/isotope.pkgd.min.js"></script>
<!-- Owl carousel javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/owl-carousel/owl.carousel.js"></script>
<!-- Magnific Popup javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Appear javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.appear.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/jquery.bxslider.js"></script>
<!-- Parallax javascript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.parallax-1.1.3.js"></script>
<!-- Contact form -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/jquery.validate.js"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/template.js"></script>
<!-- Custom Scripts -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/js/custom.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/check.js" type="text/javascript"></script>
</body>
</html>