<?php
/* @var $this SliderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sliders',
);

?>

<h1>Sliders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
