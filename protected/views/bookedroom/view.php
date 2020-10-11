<?php
/* @var $this BookedRoomController */
/* @var $model BookedRoom */

$this->breadcrumbs=array(
	'Booked Rooms'=>array('index'),
	$model->br_id,
);

$this->menu=array(
	array('label'=>'List BookedRoom', 'url'=>array('index')),
	array('label'=>'Create BookedRoom', 'url'=>array('create')),
	array('label'=>'Update BookedRoom', 'url'=>array('update', 'id'=>$model->br_id)),
	array('label'=>'Delete BookedRoom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->br_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BookedRoom', 'url'=>array('admin')),
);
?>

<h1>View BookedRoom #<?php echo $model->br_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'br_id',
		'customer_id',
		'room_type',
		'no_of_room',
		'no_of_adults',
		'no_of_childs',
		'check_in',
		'check_out',
		'room_status',
	),
)); ?>
