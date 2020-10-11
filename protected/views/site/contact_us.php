<div class="secondary-banner">
    <div class="container">
        <div class="secondary-title text-center">
            <h1>Contact Us</h1>
            <div class="seperate text-center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/images/top-icon.png" alt=""></div>
            <!-- page-intro start-->
            <!-- ================ -->
            <div class="page-intro">
                <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index">Home</a></li>
                    <li class="active">Contact Us</li>
                </ol>
            </div>
            <!-- page-intro end -->
        </div>
    </div>
</div>
<!-- banner start -->
<!-- ================ -->
<div class="banner">
    <!-- google maps start -->
    <div id="map-canvas"></div>
    <!-- google maps end -->
</div>
<!-- banner end -->
<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-8">

                <!-- page-title start -->
                <!-- ================ -->
                <b>Please fill up the form</b>
                <div class="alert alert-success hidden" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>
                <div class="alert alert-error hidden" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>
                <div class="form">

                    <?php
                    $model = new Contact();
                    $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'contact-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>true,
                        'action'=>$this->createUrl('contact/create'),
                        'enableClientValidation'=>true,

                    )); ?>
                    <div id="formResult"></div>
                    <div id="AjaxLoader" style="display: none" class="grid-view grid-view-loading"></div>
                    <div class="form-group has-feedback">
                        <label for="name"><?php echo $form->labelEx($model,'name');?></label>
                        <?php echo $form->textField($model,'name',array('class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name', 'required'=>true)); ?>
                        <i class="fa fa-user form-control-feedback"></i>
                        <?php echo $form->error($model,'name'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email"><?php echo $form->labelEx($model,'email');?></label>
                        <?php echo $form->emailField($model,'email',array('class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email', 'required'=>true)); ?>
                        <i class="fa fa-envelope form-control-feedback"></i>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="subject"><?php echo $form->labelEx($model,'subject');?></label>
                        <?php echo $form->textField($model,'subject',array('class'=>'form-control', 'id'=>'subject', 'placeholder'=>'Subject', 'required'=>true)); ?>
                        <i class="fa fa-navicon form-control-feedback"></i>
                        <?php echo $form->error($model,'subject'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="message"><?php echo $form->labelEx($model,'message');?></label>
                        <?php echo $form->textArea($model,'message',array('rows'=>4, 'class'=>'form-control', 'id'=>'message', 'placeholder'=>'Message', 'required'=>true)); ?>
                        <i class="fa fa-pencil form-control-feedback"></i>
                        <?php echo $form->error($model,'message'); ?>
                    </div>
                    <div class="row buttons">
                        <?php echo CHtml::ajaxSubmitButton('SEND',CHtml::normalizeUrl(array('contact/create','render'=>true)),
                            array(
                                'dataType'=>'json',
                                'type'=>'post',
                                'success'=>'function(data) {
                         $("#AjaxLoader").hide();
                        if(data.status=="success"){
                             $(".errorMessage").text("");
                             $(".errorMessage").hide();
                             $("#formResult").html("Your message submitted successfully.");
                             $("#formResult").show();
                             $("#formResult").delay(5000).fadeOut("slow");
                             $("#contact-form")[0].reset();
                        }else{
                            $.each(data, function(key, val) {
                            $("#contact-form #"+key+"_em_").text(val);
                            $("#contact-form #"+key+"_em_").show();
                        });
                        }
                    }',
                                'beforeSend'=>'function(){
                           $("#AjaxLoader").show();
                      }'
                            ),array('id'=>'mybtn','class'   =>'btn btn-default')); ?>
                    </div>

                    <?php $this->endWidget(); ?>

                </div><!-- form -->
            </div>
            <!-- main end -->

            <!-- sidebar start -->
            <?php if(!empty($address)){?>
                <aside class="col-md-4">
                    <div class="sidebar">
                        <div class="side vertical-divider-left">
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
                            <h3 class="title"><?php echo strtoupper($address->hotel_name); ?></h3>
                            <ul class="list">
                                <li><strong></strong></li>
                                <li><i class="fa fa-home pr-10"></i><?php echo ucwords(strtolower($address->hotel_name)); ?></li>
                                <li><i class="fa fa-globe pr-10"></i><?php echo ucwords(strtolower($address->address)); ?></li>
                                <li><i class="fa fa-phone pr-10"></i><abbr title="Phone">P:</abbr><?php echo strtoupper($address->phone); ?></li>
                                <li><i class="fa fa-mobile pr-10 pl-5"></i><abbr title="Phone">M:</abbr><?php echo strtoupper($address->mobile); ?></li>
                                <li><i class="fa fa-envelope pr-10"></i><a href="mailto:<?php echo strtolower($address->email); ?>"><?php echo strtolower($address->email); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            <?php } ?>
            
                                       <!-- trip advisor start -->  
                                                       <aside class="col-md-4">
                    <div class="sidebar">
                        <div class="side vertical-divider-left">

                            <div id="TA_socialButtonIcon507" class="TA_socialButtonIcon">
<ul id="HPRGAqhW" class="TA_links UzWINyG">
<li id="nCtxinA3" class="E8AHXVGx">
<a target="_blank" href="http://www.tripadvisor.com/Hotel_Review-g293891-d8657132-Reviews-August_Lake_Resort-Pokhara_Gandaki_Zone_Western_Region.html"><img src="http://www.tripadvisor.com/img/cdsi/img2/branding/socialWidget/20x28_green-21690-2.png"/></a>
</li>
</ul>
</div>
<script src="http://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=507&amp;locationId=8657132&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>
</div>
                    </div>
                </aside>
                           <!-- trip advisor end-->  

            <!-- sidebar end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/plugins/google.map.config.js"></script>