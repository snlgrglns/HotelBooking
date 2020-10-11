<?php
/* @var $this RestroAboutusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restro Aboutuses',
);

$this->menu=array(
	array('label'=>'Create RestroAboutus', 'url'=>array('create')),
	array('label'=>'Manage RestroAboutus', 'url'=>array('admin')),
);
?>

<h1>Restro Aboutuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
