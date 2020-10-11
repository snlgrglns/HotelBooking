<?php
/* @var $this AddressController */
/* @var $model Address */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-12">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Slider Form</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form" role="form">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'address-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>
					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'hotel_name'); ?>
							<?php echo $form->textField($model,'hotel_name',array('maxlength'=>50, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'hotel_name'); ?>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'address'); ?>
							<?php echo $form->textField($model,'address',array('maxlength'=>50, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'address'); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'phone'); ?>
							<?php echo $form->textField($model,'phone',array('maxlength'=>50, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'phone'); ?>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'mobile'); ?>
							<?php echo $form->textField($model,'mobile',array('maxlength'=>50, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'mobile'); ?>
						</div>
					</div>
					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'email'); ?>
							<?php echo $form->textField($model,'email',array('maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'email'); ?>
						</div>
					</div>
					<div class="box-footer">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
					</div>

					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!--/.col (right) -->
</div>