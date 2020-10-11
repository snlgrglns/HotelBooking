<?php
/* @var $this RestroOpeningHrsController */
/* @var $model RestroOpeningHrs */

$this->breadcrumbs=array(
	'Restro Opening Hrs'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restro-opening-hrs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'Manage', 'url'=>array('restroOpeningHrs/admin')),
			array('label'=>'Add New', 'url'=>array('restroOpeningHrs/create')),
		),
	)
);

?>
<h1>Manage Restro Opening Hrs</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'restro-opening-hrs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'days',
		'start_time',
		'end_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
