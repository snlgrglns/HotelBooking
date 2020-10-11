<?php
/* @var $this RestroOpeningHrsController */
/* @var $model RestroOpeningHrs */

$this->breadcrumbs=array(
	'Restro Opening Hrs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RestroOpeningHrs', 'url'=>array('index')),
	array('label'=>'Create RestroOpeningHrs', 'url'=>array('create')),
	array('label'=>'Update RestroOpeningHrs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RestroOpeningHrs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestroOpeningHrs', 'url'=>array('admin')),
);
?>

<h1>View RestroOpeningHrs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'days',
		'start_time',
		'end_time',
	),
)); ?>
