<?php
/* @var $this RestroAboutusController */
/* @var $model RestroAboutus */

$this->breadcrumbs=array(
	'Restro Aboutuses'=>array('index'),
	'Create',
);
?>

<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'Manage', 'url'=>array('restroAboutus/admin')),
			array('label'=>'Add New', 'url'=>array('restroAboutus/create')),
		),
	)
);

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>