<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staff'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'View Staff', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>