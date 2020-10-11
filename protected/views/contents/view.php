<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->id,
);
?>

<h1>View Contents #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'heading',
		'content',
		'status',
	),
)); ?>
