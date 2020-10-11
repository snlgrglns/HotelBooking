<?php
/* @var $this RestroMenuItemsController */
/* @var $model RestroMenuItems */

$this->breadcrumbs=array(
	'Restro Menu Items'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RestroMenuItems', 'url'=>array('index')),
	array('label'=>'Create RestroMenuItems', 'url'=>array('create')),
	array('label'=>'Update RestroMenuItems', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RestroMenuItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestroMenuItems', 'url'=>array('admin')),
);
?>

<h1>View RestroMenuItems #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'item_name',
		'sub_title',
		'image',
		'price',
		'status',
	),
)); ?>
