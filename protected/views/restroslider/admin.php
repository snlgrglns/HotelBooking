<?php
/* @var $this RestroSliderController */
/* @var $model RestroSlider */

$this->breadcrumbs=array(
	'Restro Sliders'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restro-slider-grid').yiiGridView('update', {
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
			array('label'=>'All', 'url'=>array('restroSlider/admin')),
			array('label'=>'Add New', 'url'=>array('restroSlider/create')),
		),
	)
);

?>
<h1>Manage Restro Sliders</h1>

<?php
$stat = array('0'=>'Not Active', '1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'restro-slider-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'title',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->image))?CHtml::image(Yii::app()->baseUrl . "/images/restro_slider/thumbs/" . $data->image,"",array("style"=>"width:100px;")):"no image"'
		),
		'description',
		array(
			'name'=>'status',
			'value'=>'RoomImages::stat($data->status)',
			'filter'=>$stat
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{activate}{deactivate}{view}{update}{delete}',
			'buttons' => array(
				'activate' => array(
					'label' => 'Activate',
					'visible'=>'($data->status == 0)?true:false;',
					'click'=>'function(){if (confirm("Are you sure you want to activate this data???") == true) {return true;} else {return false;}}',
					'url' => 'CHtml::normalizeUrl(array("restroSlider/activate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
				'deactivate' => array(
					'label' => 'DeActivate',
					'visible'=>'($data->status == 1)?true:false;',
					'click'=>'function(){if (confirm("Are you sure you want to de-activate this data???") == true) {return true;} else {return false;}}',
					'url' => 'CHtml::normalizeUrl(array("restroSlider/deactivate/".rawurlencode($data->id)))', //Your URL According to your wish
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