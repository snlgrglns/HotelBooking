<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Add User Form</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form clearfix" role="form">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'admin-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                    )); ?>
                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'fname'); ?>
                        <?php echo $form->textField($model,'fname',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'fname'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'mname'); ?>
                        <?php echo $form->textField($model,'mname',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'mname'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'lname'); ?>
                        <?php echo $form->textField($model,'lname',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'lname'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'email'); ?>
                        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'user_name'); ?>
                        <?php echo $form->textField($model,'user_name',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'user_name'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'password'); ?>
                        <?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'repeat_password'); ?>
                        <?php echo $form->passwordField($model,'repeat_password',array('size'=>50,'maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'repeat_password'); ?>
                    </div>

                    <div class="box-footer col-md-12">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
                    </div>

                    <?php $this->endWidget(); ?>

                </div><!-- form -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!--/.col (right) -->
</div>   <!-- /.row -->