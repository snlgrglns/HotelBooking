<?php
/* @var $this RestroSliderController */
/* @var $model RestroSlider */

$this->breadcrumbs=array(
	'Restro Sliders'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>
<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'All', 'url'=>array('restroSlider/admin')),
			array('label'=>'Add New', 'url'=>array('restroSlider/create')),
		),
	)
);

?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>