<?php
/* @var $this RestroLeftImgController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restro Left Imgs',
);

$this->menu=array(
	array('label'=>'Create RestroLeftImg', 'url'=>array('create')),
	array('label'=>'Manage RestroLeftImg', 'url'=>array('admin')),
);
?>

<h1>Restro Left Imgs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
