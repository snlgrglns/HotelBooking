<?php
/* @var $this RoomImagesController */
/* @var $model RoomImages */

$this->breadcrumbs=array(
	'Room Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage RoomImages', 'url'=>array('admin')),
);
?>

<h1>Update RoomImages <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>