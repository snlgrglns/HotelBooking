<?php
/* @var $this RestroLogoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restro Logos',
);

$this->menu=array(
	array('label'=>'Create RestroLogo', 'url'=>array('create')),
	array('label'=>'Manage RestroLogo', 'url'=>array('admin')),
);
?>

<h1>Restro Logos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
