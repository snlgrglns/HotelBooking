<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'room_type'); ?>
		<?php echo $form->textField($model,'room_type',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'room_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_such_room'); ?>
		<?php echo $form->textField($model,'total_such_room'); ?>
		<?php echo $form->error($model,'total_such_room'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_person'); ?>
		<?php echo $form->textField($model,'no_of_person'); ?>
		<?php echo $form->error($model,'no_of_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_price'); ?>
		<?php echo $form->textField($model,'room_price'); ?>
		<?php echo $form->error($model,'room_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->