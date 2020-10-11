<style>
    th, td{
        font-size: 12px;
    }
</style>
<div class="section padding-40 clearfix">
    <div class="container">
        <div class="inner-content">
            <ul class="booking-type">
                <li class="active"><a <?php if(!empty(Yii::app()->session['check_in']) and !empty(Yii::app()->session['check_out'])){ ?>href="<?php echo Yii::app()->request->baseUrl.'/site/check?arrival='.Yii::app()->session['check_in'].'&departure='.Yii::app()->session['check_out'].'&check=Check+Availability'; ?>"<?php } ?>><span>1</span>Select Available Rooms</a></li>
                <li class="active"><a <?php if(!empty(Yii::app()->session['data'])){ ?>href="<?php echo Yii::app()->request->baseUrl.'/site/userinfo'; ?>"<?php } ?>><span>2</span>Register Personal Details</a></li>
                <li><a><span>3</span>Booking Done</a></li>
            </ul>
            <div class="section blue-bg no-padding clearfix">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <?php
                        $check_in = date_create(Yii::app()->session['check_in']);
                        $check_out = date_create(Yii::app()->session['check_out']);
                        $interval = date_diff($check_in, $check_out);
                        $no_of_nights =  $interval->format('%d');
                        ?>
                        <div class="booking-form">
                            <div>Check In Date: <?php echo Yii::app()->session['check_in']; ?></div>
                            <div>Check Out Date: <?php echo Yii::app()->session['check_out']; ?></div>
                            <div>No. Of Nights: <?php echo $no_of_nights; ?></div>
                        </div>

                        <!-- masonry grid start -->

                    </div>
                    <!-- masonry grid item start -->
                    <div class="col-sm-12 col-md-12">
                        <!-- blogpost start -->
                        <?php
                        /* @var $this CustomerInfoController */
                        /* @var $model CustomerInfo */
                        /* @var $form CActiveForm */
                        ?>
                        <div class="form">

                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'customer-info-form',
                                // Please note: When you enable ajax validation, make sure the corresponding
                                // controller action is handling ajax validation correctly.
                                // There is a call to performAjaxValidation() commented in generated controller code.
                                // See class documentation of CActiveForm for details on this.
                                'enableAjaxValidation'=>false,
                            )); ?>

                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'first_name'); ?>
                                <?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100, 'placeholder'=>'First Name', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'first_name'); ?>
                            </div>

                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'last_name'); ?>
                                <?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Last Name', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'last_name'); ?>
                            </div>


                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'phone'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Phone', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'phone'); ?>
                            </div>
                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'email1'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $form->textField($model,'email1',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Email1', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'email1'); ?>
                            </div>


                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'email2'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $form->textField($model,'email2',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Email2', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'email2'); ?>
                            </div>
                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'country'); ?>
                                <?php $this->widget('ext.CountrySelectorWidget', array(
                                        'value' => $model->country,
                                        'name' => Chtml::activeName($model, 'country'),
                                        'id' => Chtml::activeId($model, 'country'),
                                        'useCountryCode' => false,
//                                                    'defaultValue' => 'Nepal',
                                        'firstEmpty' => true,
                                    )
                                );?>
                                <?php echo $form->error($model,'country'); ?>
                            </div>


                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'state_province'); ?>
                                <?php echo $form->textField($model,'state_province',array('size'=>60,'maxlength'=>100, 'placeholder'=>'State / Province', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'state_province'); ?>
                            </div>

                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'city'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100, 'placeholder'=>'City', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'city'); ?>
                            </div>


                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'zip_code'); ?>
                                <?php echo $form->textField($model,'zip_code',array('size'=>20,'maxlength'=>20, 'placeholder'=>'Zip Code', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'zip_code'); ?>
                            </div>

                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'payment_card_no'); ?>
                                <?php echo $form->textField($model,'payment_card_no',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Card No', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'payment_card_no'); ?>
                            </div>


                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'flight_details'); ?>
                                <?php echo $form->textField($model,'flight_details',array('rows'=>6, 'cols'=>50, 'placeholder'=>'Flight Details', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'flight_details'); ?>
                            </div>

                            <div class="col-md-3  form-group">
                                <?php echo $form->labelEx($model,'pick_up_at_airport'); ?>
                                <?php echo $form->dropDownList($model,'pick_up_at_airport',array('yes'=>'Yes','no'=>'No'),array('prompt'=>'Pick Up At Airport', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'pick_up_at_airport'); ?>
                            </div>

                            <div class="col-md-12  form-group">
                                <?php echo $form->labelEx($model,'personal_message'); ?>
                                <?php echo $form->textArea($model,'personal_message',array('rows'=>6, 'cols'=>50, 'placeholder'=>'Personal Message', 'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'personal_message'); ?>
                            </div>

                            <div class="col-md-12  form-group">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Book' : 'Save',array('class'=>'btn btn-info')); ?>
                            </div>

                            <?php $this->endWidget(); ?>
                        </div><!-- form -->
                        <!-- blogpost end -->
                    </div>
                    <!-- masonry grid item start -->
                    <div class="col-sm-12 col-md-12">
                        <!-- blogpost start -->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Room Type</th>
                                <th>No. of Rooms</th>
                                <th>No. of Adult</th>
                                <th>No. of Child</th>
                                <th>Cost($)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = Yii::app()->session['data'];
                            $data_arr = explode(',',$data);
                            $cost_with_room = 0;
                            foreach($data_arr as $da){
                                list($room, $room_no, $adult, $child) = explode('=>',$da); //checked_room_id+'=>'+room_no+'=>'+adult+'=>'+child
                                $room_model = Room::model()->findByPk($room);
                                $cost_with_room = $cost_with_room+($room_no * $room_model->room_price);
                                ?>
                                <tr>
                                    <td><?php echo strtoupper($room_model->room_type)?></td>
                                    <td><?php echo $room_no; ?></td>
                                    <td><?php echo $adult; ?></td>
                                    <td><?php echo $child; ?></td>
                                    <td ><?php echo number_format($room_model->room_price, 2, '.',''); ?> / (night)</td>
                                </tr>
                            <?php }
                            $cost_with_nights = $cost_with_room * $no_of_nights;
                            $cost_with_service = $cost_with_nights + ($cost_with_nights / 10);
                            $cost_with_tax = $cost_with_service + ($cost_with_service * 13 / 100);
                            ?>

                            <tr>
                                <td colspan="4">Cost With Total No. Of Nights</td>
                                <td><?php echo number_format($cost_with_nights, 2, '.',''); ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">Cost With Service Charge(10%)</td>
                                <td><?php echo number_format($cost_with_service, 2, '.',''); ?></td>
                            </tr>
                            <tr>
                                <td colspan="4">Cost With TAX(13%)</td>
                                <td><?php echo number_format($cost_with_tax,2, '.',''); ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- blogpost end -->
                    </div>
                    <!-- masonry grid item end -->
                </div>

            </div>
        </div>
    </div>
</div>