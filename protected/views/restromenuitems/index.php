<?php
/* @var $this RestroMenuItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restro Menu Items',
);

$this->menu=array(
	array('label'=>'Create RestroMenuItems', 'url'=>array('create')),
	array('label'=>'Manage RestroMenuItems', 'url'=>array('admin')),
);
?>

<h1>Restro Menu Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
