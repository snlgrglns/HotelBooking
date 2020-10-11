<?php
/* @var $this RestroMenuCategoryController */
/* @var $model RestroMenuCategory */

$this->breadcrumbs=array(
	'Restro Menu Categories'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restro-menu-category-grid').yiiGridView('update', {
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
			array('label'=>'Manage', 'url'=>array('restroMenuCategory/admin')),
			array('label'=>'Add New', 'url'=>array('restroMenuCategory/create')),
		),
	)
);
?>
<h1>Manage Restro Menu Categories</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'restro-menu-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category_name',
		array(
			'name' => 'status',
			'value' => 'Logo::checkStat($data->status)',
			'filter' => $stat,
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{activate}{deactivate}{view}{update}{delete}',
			'buttons' => array(
				'activate' => array(
					'label' => 'Activate',
					'visible'=>'($data->status == 0)?true:false;',
					'url' => 'CHtml::normalizeUrl(array("restroMenuCategory/activate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
                'deactivate' => array(
                    'label' => 'Activate',
                    'visible'=>'($data->status ==1)?true:false;',
                    'url' => 'CHtml::normalizeUrl(array("restroMenuCategory/deactivate/".rawurlencode($data->id)))', //Your URL According to your wish
                    'imageUrl' => Yii::app()->baseUrl . '/images/close.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
                ),
				'delete' => array(
					'label' => 'Delete',
					'visible'=>'($data->status == 0)?true:false;',
				),
			),
		),
	),
)); ?>
