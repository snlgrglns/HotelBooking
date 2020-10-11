<?php
/* @var $this BookedRoomController */
/* @var $model BookedRoom */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booked-room-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
		<?php echo $form->error($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_type'); ?>
		<?php echo $form->textField($model,'room_type'); ?>
		<?php echo $form->error($model,'room_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_room'); ?>
		<?php echo $form->textField($model,'no_of_room'); ?>
		<?php echo $form->error($model,'no_of_room'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_adults'); ?>
		<?php echo $form->textField($model,'no_of_adults'); ?>
		<?php echo $form->error($model,'no_of_adults'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_childs'); ?>
		<?php echo $form->textField($model,'no_of_childs'); ?>
		<?php echo $form->error($model,'no_of_childs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_in'); ?>
		<?php echo $form->textField($model,'check_in'); ?>
		<?php echo $form->error($model,'check_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_out'); ?>
		<?php echo $form->textField($model,'check_out'); ?>
		<?php echo $form->error($model,'check_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_status'); ?>
		<?php echo $form->textField($model,'room_status'); ?>
		<?php echo $form->error($model,'room_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->