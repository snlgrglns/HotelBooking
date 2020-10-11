<?php
/* @var $this RestroLogoController */
/* @var $model RestroLogo */

$this->breadcrumbs=array(
	'Restro Logos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RestroLogo', 'url'=>array('index')),
	array('label'=>'Create RestroLogo', 'url'=>array('create')),
	array('label'=>'Update RestroLogo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RestroLogo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestroLogo', 'url'=>array('admin')),
);
?>

<h1>View RestroLogo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'logo',
		'status',
	),
)); ?>
