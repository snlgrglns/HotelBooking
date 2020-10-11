<?php
/* @var $this RestroMenuCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restro Menu Categories',
);

$this->menu=array(
	array('label'=>'Create RestroMenuCategory', 'url'=>array('create')),
	array('label'=>'Manage RestroMenuCategory', 'url'=>array('admin')),
);
?>

<h1>Restro Menu Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
