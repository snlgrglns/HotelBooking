<?php
/* @var $this RoomController */
/* @var $data Room */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_type')); ?>:</b>
	<?php echo CHtml::encode($data->room_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_such_room')); ?>:</b>
	<?php echo CHtml::encode($data->total_such_room); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_person')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_price')); ?>:</b>
	<?php echo CHtml::encode($data->room_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>