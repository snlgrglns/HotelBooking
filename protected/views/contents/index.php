<?php
/* @var $this ContentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contents',
);
?>

<h1>Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
