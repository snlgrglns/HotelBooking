<?php
/* @var $this StaffController */
/* @var $model Staff */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Add Staff Form</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form" role="form">


                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'staff-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    )); ?>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'name'); ?>
                        <?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'image'); ?>Maximum image size 150KB.
                        <?php echo $form->fileField($model,'image',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'image'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'post'); ?>
                        <?php echo $form->textField($model,'post',array('size'=>20,'maxlength'=>20, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'post'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'fb_link'); ?>
                        <?php echo $form->textField($model,'fb_link',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'fb_link'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'twitter_link'); ?>
                        <?php echo $form->textField($model,'twitter_link',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'twitter_link'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class'=>'btn btn-primary')); ?>
                    </div>

                    <?php $this->endWidget(); ?>

                </div><!-- form -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!--/.col (right) -->
</div>