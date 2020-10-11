<?php
/* @var $this LogoController */
/* @var $model Logo */

$this->breadcrumbs=array(
	'Logos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Logo', 'url'=>array('index')),
	array('label'=>'Create Logo', 'url'=>array('create')),
	array('label'=>'Update Logo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Logo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Logo', 'url'=>array('admin')),
);
?>

<h1>View Logo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'logo',
		'status',
	),
)); ?>
