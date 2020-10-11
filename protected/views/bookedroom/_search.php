<?php
/* @var $this BookedRoomController */
/* @var $model BookedRoom */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'br_id'); ?>
		<?php echo $form->textField($model,'br_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_type'); ?>
		<?php echo $form->textField($model,'room_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_room'); ?>
		<?php echo $form->textField($model,'no_of_room'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_adults'); ?>
		<?php echo $form->textField($model,'no_of_adults'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_childs'); ?>
		<?php echo $form->textField($model,'no_of_childs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_in'); ?>
		<?php echo $form->textField($model,'check_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_out'); ?>
		<?php echo $form->textField($model,'check_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->