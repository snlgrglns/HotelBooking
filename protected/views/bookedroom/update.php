<?php
/* @var $this BookedRoomController */
/* @var $model BookedRoom */

$this->breadcrumbs=array(
	'Booked Rooms'=>array('index'),
	$model->br_id=>array('view','id'=>$model->br_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BookedRoom', 'url'=>array('index')),
	array('label'=>'Create BookedRoom', 'url'=>array('create')),
	array('label'=>'View BookedRoom', 'url'=>array('view', 'id'=>$model->br_id)),
	array('label'=>'Manage BookedRoom', 'url'=>array('admin')),
);
?>

<h1>Update BookedRoom <?php echo $model->br_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>