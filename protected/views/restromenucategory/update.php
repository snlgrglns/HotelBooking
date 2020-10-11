<?php
/* @var $this RestroMenuCategoryController */
/* @var $model RestroMenuCategory */

$this->breadcrumbs=array(
	'Restro Menu Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RestroMenuCategory', 'url'=>array('index')),
	array('label'=>'Create RestroMenuCategory', 'url'=>array('create')),
	array('label'=>'View RestroMenuCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RestroMenuCategory', 'url'=>array('admin')),
);
?>

<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'Manage', 'url'=>array('restroMenuCategory/admin')),
			array('label'=>'Add New', 'url'=>array('restroMenuCategory/create')),
		),
	)
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>