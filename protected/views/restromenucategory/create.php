<?php
/* @var $this RestroMenuCategoryController */
/* @var $model RestroMenuCategory */

$this->breadcrumbs=array(
	'Restro Menu Categories'=>array('index'),
	'Create',
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