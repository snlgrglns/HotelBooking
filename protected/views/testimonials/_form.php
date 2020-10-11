<div class="row">
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Testimonial Form</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form clearfix" role="form">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'testimonials-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    )); ?>

                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                    <?php echo $form->errorSummary($model); ?>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'heading'); ?>
                        <?php echo $form->textField($model,'heading',array('maxlength'=>30, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'heading'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'name'); ?>
                        <?php echo $form->textField($model,'name',array('maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'company'); ?>
                        <?php echo $form->textField($model,'company',array('maxlength'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'company'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'image'); ?>
                        <?php echo $form->fileField($model,'image',array('maxlength'=>100, 'class'=>'form-control')); ?>Maximum file size is 100 KB.
                        <?php echo $form->error($model,'image'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'message'); ?>
                        <?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'message'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-info')); ?>
                    </div>

                    <?php $this->endWidget(); ?>

                </div><!-- form -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!--/.col (right) -->