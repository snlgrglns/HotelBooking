<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="<?php echo Yii::app()->request->baseUrl.'/site/index'; ?>">Home</a></li>
                    <li class="active">About Room</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

<!-- main-container start -->
<!-- ================ -->
<?php if(!empty($room)){?>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-12">
                    <!-- page-title start -->
                    <!-- ================ -->
                    <h1 class="page-title"><?php echo $room->room_type; ?> ROOM</h1>
                    <div class="separator-2"></div>
                    <!-- page-title end -->
                    <div class="row">
                        <div class="col-md-6">
                            <?php if(!empty($room->description)){?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo $room->description; ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="space hidden-md hidden-lg"></div>
                        </div>
                        <?php if(!empty($sliders)){ ?>
                            <div class="col-md-6">
                                <div class="slider clearfix">
                                    <div id="slider" class="flexslider">
                                        <ul class="slides">
                                            <?php foreach($sliders as $sldr){ ?>
                                                <li> <img src="<?php echo Yii::app()->request->baseUrl.'/images/roomImages/medium/'.$sldr->image; ?>"  alt="" /> </li>
                                            <?php } ?>
                                        </ul>
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
<?php }
if(!empty($others)){
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
                    <h2 class="text-center">Other Rooms</h2>
                    <div class="seperate text-center"><img src="<?php echo Yii::app()->request->baseUrl ;?>/frontendfiles/images/top-icon.png" alt=""></div>
                    <!-- page-title end -->
                    <div class="row grid-space-20">
                        <?php foreach($others as $oth){
                            $r = Room::model()->findByPk($oth->room_id);
                            ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="box-body">
                                    <div class="image"> <img src="<?php echo Yii::app()->request->baseUrl.'/images/roomImages/thumbs/'.$oth->image ;?>" alt=""> </div>
                                    <div class="box-content">
                                        <h3 class="image-title"><?php echo ucwords(strtolower($r->room_type)); ?></h3>
                                        <div class="box-text"><span class="rate">$<?php echo $r->room_price; ?>/<sup>night</sup></span></div>
                                        <div class="box-btn"><a href="<?php echo Yii::app()->request->baseUrl.'/site/aboutrm/'.$oth->room_id; ?>" class="btn btn-white pull-right">View Detail</a></div>
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
<?php } ?>