<?php
/* @var $this BookedRoomController */
/* @var $data BookedRoom */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('br_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'br_id'=>$data->br_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_type')); ?>:</b>
	<?php echo CHtml::encode($data->room_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_room')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_room); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_adults')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_adults); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_childs')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_childs); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('check_in')); ?>:</b>
	<?php echo CHtml::encode($data->check_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_out')); ?>:</b>
	<?php echo CHtml::encode($data->check_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>