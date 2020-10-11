<?php
/* @var $this RoomImagesController */
/* @var $model RoomImages */

$this->breadcrumbs=array(
	'Room Images'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Delete RoomImages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomImages', 'url'=>array('admin')),
);
?>

<h1>View RoomImages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_id',
		'image',
		'image_status',
	),
)); ?>
