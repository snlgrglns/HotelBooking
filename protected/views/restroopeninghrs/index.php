<?php
/* @var $this RestroOpeningHrsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restro Opening Hrs',
);

$this->menu=array(
	array('label'=>'Create RestroOpeningHrs', 'url'=>array('create')),
	array('label'=>'Manage RestroOpeningHrs', 'url'=>array('admin')),
);
?>

<h1>Restro Opening Hrs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
