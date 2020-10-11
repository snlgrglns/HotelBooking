<?php
/* @var $this RestroLeftImgController */
/* @var $model RestroLeftImg */

$this->breadcrumbs=array(
	'Restro Left Imgs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RestroLeftImg', 'url'=>array('index')),
	array('label'=>'Create RestroLeftImg', 'url'=>array('create')),
	array('label'=>'Update RestroLeftImg', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RestroLeftImg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestroLeftImg', 'url'=>array('admin')),
);
?>

<h1>View RestroLeftImg #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'status',
	),
)); ?>
