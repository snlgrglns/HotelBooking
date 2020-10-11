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
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email1'); ?>
		<?php echo $form->textField($model,'email1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email2'); ?>
		<?php echo $form->textField($model,'email2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state_province'); ?>
		<?php echo $form->textField($model,'state_province',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'state_province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'personal_message'); ?>
		<?php echo $form->textArea($model,'personal_message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'personal_message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pick_up_at_airport'); ?>
		<?php echo $form->textField($model,'pick_up_at_airport',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'pick_up_at_airport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_card_no'); ?>
		<?php echo $form->textField($model,'payment_card_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'payment_card_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->