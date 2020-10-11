<div class="page-wrapper">
    <!-- header start (remove fixed class from header in order to disable fixed navigation mode) -->
    <!-- ================ -->
    <div id="header-top" ><header class="header header-small fixed clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- header-left start -->
                        <!-- ================ -->
                        <div class="header-left clearfix">
                            <!-- logo -->
                            <div class="logo">
                                <a href="#">
                                    <?php if(!empty($logo)){ ?>
                                        <img id="logo" src="<?php echo Yii::app()->request->baseUrl.'/images/restro_logo/'.$logo->id.'/'.$logo->logo; ?>" alt="restro logo">
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
                            <div class="main-navigation animated">

                                <!-- navbar start -->
                                <!-- ================ -->
                                <nav class="navbar navbar-default" role="navigation">
                                    <div class="container-fluid">

                                        <!-- Toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right">
                                                <?php if(!empty($restro_slider)){ ?>
                                                    <li class="active">
                                                        <a href="#header-top">Home</a>
                                                    </li>
                                                <?php }  if(!empty($restro_abt)){ ?>
                                                    <li><a href="#about">About</a></li>
                                                <?php } if(!empty($menuscat)){ ?>
                                                    <li><a href="#menu">Menu</a></li>
                                                    <li><a href="#gallery">Gallery</a></li>
                                                <?php } if(!empty($tests)){ ?>
                                                    <li><a href="#testimonial">Testimonials</a></li>
                                                <?php } ?>
                                                <li><a href="#footer">Contact</a></li>
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
    </div>
    <!-- header end -->

    <!-- banner start -->
    <!-- ================ -->
    <?php if(!empty($restro_slider)){ ?>
        <div class="banner">
            <!-- slideshow start -->
            <!-- ================ -->
            <div id="slider" class="flexslider">
                <ul class="slides">
                    <?php foreach($restro_slider as $rs){ ?>
                        <li>
                            <img src="<?php echo Yii::app()->request->baseUrl.'/images/restro_slider/fullsized/'.$rs->image; ?>" />
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- slideshow end -->
        </div>
        <!-- banner end -->
    <?php } ?>

    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="300">

        <!-- section start -->
        <!-- ================ -->
        <div class="clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">


                        <h2 class="section-title text-center" id="about">About Us</h2>

                        <?php if(!empty($restro_abt)){ ?>
                            <p class="lead text-center"><?php echo $restro_abt->heading; ?></p>
                            <br>
                            <div class="row">
                                <?php if($restro_abt->image!=null){ ?>
                                    <div class="col-md-6">
                                        <?php echo $restro_abt->content; ?>
                                    </div>

                                    <!-- sidebar start -->

                                    <aside class="sidebar col-md-6">
                                        <div class="side vertical-divider-left">
                                            <div class="block clearfix">
                                                <img src="<?php echo Yii::app()->request->baseUrl.'/images/restro_abtus/'.$restro_abt->id.'/'.$restro_abt->image; ?>" alt="">
                                            </div>
                                        </div>
                                    </aside>
                                    <!-- sidebar end -->
                                <?php }else{ ?>
                                    <div class="col-md-12">
                                        <?php echo $restro_abt->content; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <!-- section end -->

    </section>
    <!-- main-container end -->
    <?php if(!empty($restro_openings)){ ?>
        <div class="section parallax  parallax-bg-3 object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="300">
            <div class="container">
                <div class="call-to-action">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="section-title text-center">Openning Hours</h2>
                        </div>
                        <?php foreach($restro_openings as $keys=>$rop) {
                            if ($keys/2 == 0) { ?>
                                <div class="col-md-3 col-md-offset-3">
                                    <div class="section-subtitle days">
                                        <?php echo ucwords(strtolower($rop->days)); ?>
                                    </div>
                                    <div class="section-subtitle hours">
                                        <?php echo $rop->start_time; ?><span>-<?php echo $rop->end_time; ?></span>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-3">
                                    <div class="section-subtitle days">
                                        <?php echo ucwords(strtolower($rop->days)); ?>
                                    </div>
                                    <div class="section-subtitle hours">
                                        <?php echo $rop->start_time; ?><span>-<?php echo $rop->end_time; ?></span>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <!-- section start -->
    <!-- ================ -->

    <!-- section end -->

    <!-- section start -->
    <!-- ================ -->
    <div class="section menu clearfix">
        <div id="fl_menu">
            <?php if(!empty($left_mov_img)){ ?>
                <div class="label"><img src="<?php echo Yii::app()->request->baseUrl.'/images/restro_left_img/'.$left_mov_img->id.'/'.$left_mov_img->image; ?>" alt=""></div>
            <?php } ?>
        </div>
        <div class="container">
            <br>
            <h2 class="text-center" id="menu"><img src="<?php echo Yii::app()->request->baseUrl.'/images/menu-logo.png'; ?>" alt=""></h2>

            <br>
            <?php if(!empty($menuscat)){ ?>
                <div class="row">
                    <?php foreach($menuscat as $menuca){
                        $menuitems=RestroMenuItems::model()->findAllByAttributes(array('category_id'=>$menuca->id)); ?>
                        <div class="col-md-4 object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="300">
                            <h2 class="section-title"><?php echo ucwords(strtolower($menuca->category_name)); ?></h2>
                            <ul class="menu-list">
                                <?php if(!empty($menuitems)){
                                    foreach($menuitems as $item){ ?>
                                        <li><strong><?php echo ucwords(strtolower($item->item_name)); ?></strong>
                                            <?php echo $item->sub_title; ?>
                                            <span class="pull-right">$<?php echo $item->price; ?></span>
                                        </li>
                                    <?php }
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="space"></div>
        </div>
    </div>
    <!-- section end -->

    <?php if(!empty($menuscat)){ ?>
        <!-- section start -->
        <!-- ================ -->
        <div class="section object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="300">
            <div class="container">
                <br>
                <h2 class="section-title text-center " id="gallery">Gallery</h2>
                <div class="separator"></div>
                <br>
                <div class="row">
                    <div class="col-md-12">

                        <!-- isotope filters start -->
                        <div class="filters text-center">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#" data-filter="*">All</a></li>
                                <?php foreach($menuscat as $categ){ ?>
                                    <li><a href="#" data-filter=".<?php echo $categ->id; ?>"><?php echo ucwords(strtolower($categ->category_name)); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- isotope filters end -->

                        <!-- portfolio items start -->
                        <div class="isotope-container row grid-space-20">
                            <?php foreach($menuscat as $categ) {
                                $items = RestroMenuItems::model()->findAllByAttributes(array('category_id' => $categ->id));
                                foreach ($items as $it) { ?>
                                    <div class="col-sm-6 col-md-3 isotope-item <?php echo $it->category_id; ?>">
                                        <div class="image-box">
                                            <div class="overlay-container">
                                                <img src="<?php echo Yii::app()->request->baseUrl.'/images/restro_item/thumbs/'.$it->image;  ?>" alt="" style="width: 270px; height: 180px;">
                                                <div class="overlay">
                                                    <div class="overlay-links">
                                                        <a href="<?php echo Yii::app()->request->baseUrl.'/images/restro_item/fullsized/'.$it->image;  ?>"
                                                           class="popup-img"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }?>
                        </div>
                        <!-- portfolio items end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- section end -->
    <?php } ?>

    <!-- section start -->
    <!-- ================ -->
    <?php if(!empty($tests)){ ?>
        <div class="section parallax-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="300">
            <div class="owl-carousel content-slider" id="testimonial">
                <?php foreach($tests as $testi){ ?>
                    <div class="testimonial">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2 class="title"><?php echo ucwords(strtolower($testi->heading)); ?></h2>
                                    <div class="testimonial-image">
                                        <img src="<?php echo Yii::app()->request->baseUrl.'/images/testimonials/'.$testi->id.'/'.$testi->image; ?>" alt="Jane Doe" title="Jane Doe" class="img-circle">
                                    </div>
                                    <div class="testimonial-body">
                                        <p><?php echo $testi->message; ?></p>
                                        <div class="testimonial-info-1">- <?php echo ucwords(strtolower($testi->name)); ?></div>
                                        <div class="testimonial-info-2"><?php echo ucwords(strtolower($testi->company)); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <!-- section end -->

    <!-- section start -->
    <!-- ================ -->

    <!-- section end -->

    <!-- footer start (Add "light" class to #footer in order to enable light footer) -->
    <!-- ================ -->
    <footer id="footer" class="dark object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">

        <!-- .footer start -->
        <!-- ================ -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="footer-content object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="300">

                            <p>Veritatis officiis ullam libero quam aliquam, tenetur dolor incidunt praesentium dolorum laborum tempora suscipit quo sapiente?</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. possimus laborum. Accusantium, itaque.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-icons">
                                        <li><i class="fa fa-map-marker pr-10"></i> One infinity loop, 54100</li>
                                        <li><i class="fa fa-phone pr-10"></i> +00 1234567890</li>
                                        <li><i class="fa fa-envelope-o pr-10"></i> info@augustlakeresort.com</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="social-links colored">
                                        <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
                                        <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-content object-non-visible" data-animation-effect="fadeInRightSmall" data-effect-delay="300">
                            <h2>Contact Us</h2>
                            <div class="alert alert-success" id="contactSuccess2" style="display: none;">
                                <strong>Success!</strong> Message sent successfully!!!
                            </div>
                            <div class="alert alert-error" id="contactError2" style="display: none;">
                                <strong>Error!</strong> Message sending failed!!!
                            </div>
                            <form role="form" id="contact-form">
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="name2">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="email2">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="message2">Message</label>
                                    <textarea class="form-control" rows="4" id="message" placeholder="Message" name="message"></textarea>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                                <input type="submit" value="Send" class="btn btn-default" name="contact">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .footer end -->

        <!-- .subfooter start -->
        <!-- ================ -->
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Copyright &copy; 2015. All Rights Reserved</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- .subfooter end -->

    </footer>
    <!-- footer end -->

</div>
<script language="javascript">
    $(document).ready(function() {
        $("#contact-form").submit(function(e) {
            e.preventDefault();
            var $form = $(this);

            // check if the input is valid
            if(! $form.valid()){
                $("#contactSuccess2").hide();
                $("#contactError2").show();
                $("#contactError2").delay(5000).fadeOut("slow");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl; ?>/restro/restrocontact",
                data: {'name': $('#name').val(), 'email': $('#email').val(), 'message': $('#message').val()},
                'cache': false,
                'success': function (data) {
                    var parsed_data = jQuery.parseJSON(data);
                    if (parsed_data.msg == 'yes') {
                        $("#contactSuccess2").show();
                        $("#contactSuccess2").delay(5000).fadeOut("slow");
                        $("#contactError2").hide();
                        $("#contact-form")[0].reset();
                    } else {
                        $("#contactSuccess2").hide();
                        $("#contactError2").show();
                        $("#contactError2").delay(5000).fadeOut("slow");
                    }
                }
            });
        });
    });
</script>