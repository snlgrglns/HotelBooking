<?php
/* @var $this RestroLogoController */
/* @var $model RestroLogo */

$this->breadcrumbs=array(
	'Restro Logos'=>array('index'),
	'Create',
);
?>

<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'All', 'url'=>array('restroLogo/admin')),
			array('label'=>'Add New', 'url'=>array('restroLogo/create')),
		),
	)
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>