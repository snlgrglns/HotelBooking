<?php
/* @var $this LogoController */
/* @var $model Logo */

$this->breadcrumbs=array(
	'Logos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Logo', 'url'=>array('index')),
	array('label'=>'Manage Logo', 'url'=>array('admin')),
);
?>

<h1>Create Logo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>