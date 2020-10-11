<?php
/* @var $this RestroSliderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restro Sliders',
);

$this->menu=array(
	array('label'=>'Create RestroSlider', 'url'=>array('create')),
	array('label'=>'Manage RestroSlider', 'url'=>array('admin')),
);
?>

<h1>Restro Sliders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
