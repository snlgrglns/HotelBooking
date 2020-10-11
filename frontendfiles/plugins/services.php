<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="<?php echo Yii::app()->request->baseUrl.'/site/index'; ?>">Home</a></li>
                    <li class="active">Services</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->
<!-- main-container start -->
<!-- ================ -->
<?php if(!empty($services)){?>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-12">
                    <!-- page-title start -->
                    <!-- ================ -->
                    <h1 class="page-title">Our Services</h1>
                    <div class="separator-2"></div>
                    <!-- page-title end -->
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row grid-space-10">
                                <?php foreach($services as $serv){?>
                                    <div class="col-sm-4">
                                        <div class="box-style-2 object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                                            <div class="icon-container">
                                                <i class="icon"><img src="<?php echo Yii::app()->request->baseUrl.'/images/services/'.$serv->id.'/'.$serv->icon_image; ?>"  alt=""></i>
                                            </div>
                                            <div class="body">
                                                <h3><?php echo ucwords(strtolower($serv->heading)); ?></h3>
                                                <p><?php echo $serv->short_description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="space hidden-md hidden-lg"></div>
                        </div>
                        <div class="col-md-3">
                            <!--Put Check Avaible Here-->
                        </div>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </section>
<?php } ?>
<!-- main-container end -->