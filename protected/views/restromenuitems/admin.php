<?php
/* @var $this RestroMenuItemsController */
/* @var $model RestroMenuItems */

$this->breadcrumbs=array(
	'Restro Menu Items'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restro-menu-items-grid').yiiGridView('update', {
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
			array('label'=>'Manage', 'url'=>array('restroMenuItems/admin')),
			array('label'=>'Add New', 'url'=>array('restroMenuItems/create')),
		),
	)
);
?>
<h1>Manage Restro Menu Items</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'restro-menu-items-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 'name'=>'category', 'value'=>'$data->cat? $data->cat->category_name: "-"' ),
		'item_name',
		'sub_title',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->image))?CHtml::image(Yii::app()->baseUrl . "/images/restro_item/thumbs/" . $data->image,"",array("style"=>"width:100px;")):"no image"'
		),
		'price',
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
