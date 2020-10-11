<?php
/* @var $this BookedRoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Booked Rooms',
);

$this->menu=array(
	array('label'=>'Create BookedRoom', 'url'=>array('create')),
	array('label'=>'Manage BookedRoom', 'url'=>array('admin')),
);
?>

<h1>Booked Rooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
