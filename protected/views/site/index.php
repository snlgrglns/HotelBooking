<!-- banner start -->
<!-- ================ -->
<div class="banner">
    <!-- slideshow start -->
    <!-- ================ -->
    <div class="slideshow">
        <!-- slider revolution start -->
        <ul class="bxslider">

        <!-- ================ -->
        <?php if(!empty($slider)) {
            foreach ($slider as $s) {
                ?>
                    <li><img src="<?php echo Yii::app()->request->baseUrl . '/images/slider/fullsized/'.$s->image; ?>" style="width: 1500px;max-width: 100%;"/>
                        <div class="slider-caption">

                            <h3><?php echo strtoupper($s->title); ?></h3>
                            <p><?php echo $s->description; ?></p>
                        </div>
                    </li>
            <?php }
        } ?>
        </ul>

        <!-- slider revolution end -->
    </div>
    <!-- slideshow end -->
</div>
<!-- banner end -->
<!-- page-top start-->
<!-- ================ -->
<div class="page-top">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-9">
                <div class="left-block">
                    <?php if(!empty($welcome)){ ?>
                        <h1><?php echo strtoupper($welcome->heading); ?></h1>
                        <p><?php echo $welcome->content; ?></p>
                    <?php } ?>
                </div>
            </div>
            <?php if(!empty($room)){?>
                <form action="<?php echo Yii::app()->request->baseUrl; ?>/site/check" method="GET">
                    <div class="col-md-3 clearfix">
                        <div class="right-block clearfix"><div class=" date">
                                <div class="date-title">
                                    <h3>Check Your Rooms</h3>
                                </div>
                                <div class="date-wrapper">
                                    <input type="text" class="datepicker" placeholder="Arrival" id="arrival" name="arrival" required> <i class="fa fa-calendar"></i>
                                </div>
                                <div class="date-wrapper">
                                    <input type="text" class="datepicker" placeholder="Departure" id="departure" name="departure" required><i class="fa fa-calendar"></i>
                                </div>
                                <!--                            <input type="hidden" id="TextBox3" name="no_of_days">-->
                            </div><div class="age-group">
                                <input type="submit" name="check" value="Check Availability" class="btn btn-danger book-btn pull-right">
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php if(!empty($services)){?>
    <!-- page-top end -->
    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container light-gyay-bg">
        <!-- main start -->
        <!-- ================ -->
        <div class="main">
            <div class="container">
                <div class="row service-list">
                    <?php foreach($services as $serv){?>
                        <div class="col-sm-3">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0"> <i class="fa resturant"><img src="<?php echo Yii::app()->request->baseUrl.'/images/services/'.$serv->id.'/'.$serv->icon_image; ?>" style="width: 60px; height: 60px;" alt=""></i>
                                <h4><?php echo ucwords(strtolower($serv->heading)); ?></h4>
                                <p><?php echo $serv->short_description; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="view-btn text-center"> <a target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/site/services'; ?>" class="btn btn-danger">View All Services</a></div>
            </div>
        </div>
        <!-- main end -->
    </section>
<?php }
if(!empty( $roomImages)){
    ?>
    <!-- main-container end -->
    <!-- ================ -->

    <section class="main-container" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-12">

                    <!-- page-title start -->
                    <!-- ================ -->
                    <h2 class="text-center">View Your Rooms</h2>
                    <div class="seperate text-center"><img src="<?php echo Yii::app()->request->baseUrl ;?>/frontendfiles/images/top-icon.png" alt=""></div>
                    <!-- page-title end -->
                    <div class="row grid-space-20">
                        <?php foreach( $roomImages as $oth){
                            $r = Room::model()->findByPk($oth->room_id);                            
                            ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="box-body">
                                    <div class="image"> <img src="<?php echo Yii::app()->request->baseUrl.'/images/roomImages/thumbs/'.$oth->image ;?>" alt=""> </div>
                                    <div class="box-content">
                                        <h3 class="image-title"><?php echo ucwords(strtolower($r->room_type)); ?></h3>
                                       
                                    </div>
                                    <div class="hover-effect">
                                    	 <h3 class="image-title"><?php echo ucwords(strtolower($r->room_type)); ?></h3>
                                        <div class="box-text"><span class="rate">$<?php echo $r->room_price; ?>/<sup>night</sup></span></div>
                                        <div class="box-btn"><a target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/site/aboutrm/'.$oth->room_id; ?>" class="btn btn-white pull-right"><i class="fa fa-chevron-right"></i>View Detail</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </section>
    <!-- section end -->
<?php }  if(!empty($bottimages)){?>
    <div class="section clearfix">
        <div class="container">

            <h2 class="text-center">Room Images</h2>
            <div class="seperate text-center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/images/top-icon.png" alt=""></div>

            <div class="owl-carousel carousel">
                <?php foreach($bottimages as $bi){?>
                    <div class="image-box object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="300">
                        <div class="overlay-container"> <img src="<?php echo Yii::app()->request->baseUrl.'/images/roomImages/thumbs/'.$bi->image; ?>" alt="" style="height: 200px; width: 400px;">
                            <a href="<?php echo Yii::app()->request->baseUrl.'/images/roomImages/medium/'.$bi->image; ?>" class="popup-img"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
<?php }
$presYear = date('Y');
$presMonth = date('m');
$presDay = date('d');
?>
<!-- section end -->