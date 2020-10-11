<?php
/* @var $this RestroMenuCategoryController */
/* @var $model RestroMenuCategory */

$this->breadcrumbs=array(
	'Restro Menu Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RestroMenuCategory', 'url'=>array('index')),
	array('label'=>'Create RestroMenuCategory', 'url'=>array('create')),
	array('label'=>'Update RestroMenuCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RestroMenuCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestroMenuCategory', 'url'=>array('admin')),
);
?>

<h1>View RestroMenuCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
		'status',
	),
)); ?>
