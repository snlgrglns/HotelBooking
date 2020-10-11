<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="<?php echo Yii::app()->request->baseUrl.'/site/index'; ?>">Home</a></li>
                    <li class="active">About</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">ABOUT US</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->

                <div class="row">
                    <div class="col-md-6">
                        <?php if(!empty($about)){?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $about->content; ?>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <?php if(!empty($sliders)){ ?>
                        <div class="col-md-6">
                            <div class="slider clearfix">
                                <div id="slider" class="flexslider">
                                    <ul class="slides">
                                        <?php foreach($sliders as $sldr){ ?>
                                            <li> <img src="<?php echo Yii::app()->request->baseUrl.'/images/slider/fullsized/'.$sldr->image; ?>"  alt="" /> </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-12">
                    <div class="col-md-9">
                        <?php if(!empty($services)){
                            ?>
                            <div class="room-facility"><h2>Our Services</h2>
                                <div class="facility-list row">
                                    <?php foreach($services as $serv){?>
                                        <div class="col-md-4 facility-item">
                                            <i class="fa breakfast"><img src="<?php echo Yii::app()->request->baseUrl.'/images/services/'.$serv->id.'/'.$serv->icon_image; ?>" style="width: 64px; height: 64px;" alt="" /></i> <?php echo ucwords(strtolower($serv->heading)); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/site/check" method="GET">
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
                                </div>
                                <div class="age-group">
                                    <input type="submit" name="check" value="Check Availability" class="btn btn-danger book-btn pull-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="space hidden-md hidden-lg"></div>
                <?php if(!empty($staff)){ ?>
                    <h2>Our Team</h2>
                    <div class="separator-2"></div>
                    <ul class="ch-grid">
                        <?php foreach($staff as $st){ ?>
                            <li>
                                <div class="ch-item">
                                    <div class="ch-info">
                                        <h3><?php echo $st->name; ?></h3>
                                        <p><?php echo ucwords(strtolower($st->post)); ?></p>
                                        <a href="<?php echo $st->fb_link; ?>" class="facebook"><i class="fa fa-facebook"></i></a> <a href="<?php echo $st->twitter_link; ?>" class="twitter"><i class="fa fa-twitter"></i></a> </div>
                                    <div class="ch-thumb" style="z-index: 12;background-image: url('<?php echo Yii::app()->request->baseUrl.'/images/staff/'.$st->id.'/'.$st->image; ?>')"></div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
            <!-- main end -->
        </div>
    </div>
</section>
<!-- main-container end -->