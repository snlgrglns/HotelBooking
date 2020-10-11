<?php
/* @var $this SliderController */
/* @var $model Slider */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-12">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Restro Slider Form</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form" role="form">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'restro-slider-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)); ?>
					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'title'); ?>
							<?php echo $form->textField($model,'title',array('size'=>90,'maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'title'); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'image'); ?>
							<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'image'); ?>
						</div>
						<div class="form-group">
							<?php echo $form->labelEx($model,'description'); ?>
							<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'description'); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="box-footer">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
						</div>
					</div>
					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!--/.col (right) -->
</div>