<?php
/* @var $this SliderController */
/* @var $model Slider */

$this->breadcrumbs=array(
	'Sliders'=>array('index'),
	'Create',
);
?>
<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'All', 'url'=>array('slider/admin')),
			array('label'=>'Add New', 'url'=>array('slider/create')),
			array('label'=>'Home', 'url'=>array('slider/home')),
			array('label'=>'About Us', 'url'=>array('slider/about')),
		),
	)
);

?>0
<?php $this->renderPartial('_form', array('model'=>$model)); ?>