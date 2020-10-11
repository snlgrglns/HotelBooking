<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Admin', 'url'=>array('index')),
	array('label'=>'Create Admin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admin-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Manage Admins</h3>


<?php ////echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<!--<div class="search-form" style="display:none">-->
<!--<div class="search-form">-->
<?php //$this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-grid',
	'dataProvider'=>$model->searchCol(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'fname',
		'mname',
		'lname',
		'email',
		'user_name',
		/*
		'password',
		'reset_token',
		'created_date',
		'updated_date',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
