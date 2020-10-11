<?php
/* @var $this RestroOpeningHrsController */
/* @var $model RestroOpeningHrs */

$this->breadcrumbs=array(
	'Restro Opening Hrs'=>array('index'),
	'Create',
);
?>

<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'Manage', 'url'=>array('restroOpeningHrs/admin')),
			array('label'=>'Add New', 'url'=>array('restroOpeningHrs/create')),
		),
	)
);

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>