<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Services', 'url'=>array('index')),
	array('label'=>'Manage Services', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>