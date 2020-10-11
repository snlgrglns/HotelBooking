<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_type'); ?>
		<?php echo $form->textField($model,'room_type',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_such_room'); ?>
		<?php echo $form->textField($model,'total_such_room'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_person'); ?>
		<?php echo $form->textField($model,'no_of_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_price'); ?>
		<?php echo $form->textField($model,'room_price'); ?>
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