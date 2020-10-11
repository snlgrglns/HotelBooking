<?php
/* @var $this CustomerInfoController */
/* @var $data CustomerInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email1')); ?>:</b>
	<?php echo CHtml::encode($data->email1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email2')); ?>:</b>
	<?php echo CHtml::encode($data->email2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('state_province')); ?>:</b>
	<?php echo CHtml::encode($data->state_province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personal_message')); ?>:</b>
	<?php echo CHtml::encode($data->personal_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pick_up_at_airport')); ?>:</b>
	<?php echo CHtml::encode($data->pick_up_at_airport); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_card_no')); ?>:</b>
	<?php echo CHtml::encode($data->payment_card_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>