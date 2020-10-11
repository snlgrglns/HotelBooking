<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="index.php">Home</a></li>
                    <li class="active">Testimonial</li>
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
                <h1 class="page-title">Testimonial</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->
                <div class="row">
                    <?php if(!empty($test)){?>

                        <div class="col-md-9">
                            <div class="row">
                                <?php foreach($test as $tm){?>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="testimonial clearfix">
                                            <h2 class="title"><?php echo strtoupper($tm->heading); ?></h2>
                                            <div class="testimonial-image"> <img src="<?php echo Yii::app()->request->baseUrl.'/images/testimonials/'.$tm->id.'/'.$tm->image; ?>" alt="" style="height: 64px; width: 64px;" title="" > </div>
                                            <div class="testimonial-body">
                                                <p><?php echo $tm->message; ?></p>
                                                <div class="testimonial-info-1">- <?php echo ucwords(strtolower($tm->name)); ?></div>
                                                <div class="testimonial-info-2"><?php echo ucwords(strtolower($tm->company)); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="space hidden-md hidden-lg"></div>
                        </div>
                    <?php } ?>

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
            </div>
            <!-- main end -->
        </div>
    </div>
</section>
<!-- main-container end -->