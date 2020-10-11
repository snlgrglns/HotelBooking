<?php
/* @var $this BookedRoomController */
/* @var $model BookedRoom */

$this->breadcrumbs=array(
	'Booked Rooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BookedRoom', 'url'=>array('index')),
	array('label'=>'Manage BookedRoom', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>