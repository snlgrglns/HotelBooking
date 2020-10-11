<?php
/* @var $this LogoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Logos',
);

$this->menu=array(
	array('label'=>'Create Logo', 'url'=>array('create')),
	array('label'=>'Manage Logo', 'url'=>array('admin')),
);
?>

<h1>Logos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
