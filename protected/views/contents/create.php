<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);
?>

<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'Create New', 'url'=>array('contents/create')),
			array('label'=>'All', 'url'=>array('contents/admin')),
			array('label'=>'Welcome Note', 'url'=>array('contents/welcome')),
			array('label'=>'About Us', 'url'=>array('contents/about')),
			array('label'=>'Gallery', 'url'=>array('contents/gallery')),
			array('label'=>'Tariff', 'url'=>array('contents/tariff')),
		),
	)
);

?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>