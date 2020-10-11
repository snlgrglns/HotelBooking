<?php
/* @var $this RestroAboutusController */
/* @var $model RestroAboutus */

$this->breadcrumbs=array(
	'Restro Aboutuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RestroAboutus', 'url'=>array('index')),
	array('label'=>'Create RestroAboutus', 'url'=>array('create')),
	array('label'=>'Update RestroAboutus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RestroAboutus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestroAboutus', 'url'=>array('admin')),
);
?>

<h1>View RestroAboutus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'heading',
		'image',
		'content',
		'status',
	),
)); ?>
