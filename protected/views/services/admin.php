<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Services', 'url'=>array('index')),
	array('label'=>'Create Services', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#services-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Services</h1>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
    </div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="flash-error">
        <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
    </div>
<?php endif; ?>
<?php
$itemStat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'services-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
//		'icon_image',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->icon_image))?CHtml::image(Yii::app()->baseUrl . "/images/services/$data->id/" . $data->icon_image,"",array("style"=>"width:100px;")):"no icon"'
//            'value' => 'Competition::checkImage($data->image, $data->id)',
		),
		'heading',
		'short_description',
		'full_description',
		array(
			'name' => 'status',
			'value' => 'Services::checkStatus($data->status)',
			'filter' => $itemStat,
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}{update}{activate}{deactivate}{delete}',
			'buttons' => array(
				'activate' => array(
					'label' => 'Activate',
					'visible'=>'($data->status == 0)?true:false;',
					'click'=>'function(){if (confirm("Are you sure you want to activate this service???") == true) {return true;} else {return false;}}',
					'url' => 'CHtml::normalizeUrl(array("services/activate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
				'deactivate' => array(
					'label' => 'Deactivate',
					'visible'=>'($data->status == 1)?true:false;',
					'click'=>'function(){if (confirm("Are you sure you want to deactivate this service???") == true) {return true;} else {return false;}}',
					'url' => 'CHtml::normalizeUrl(array("services/deactivate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/close.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
			),
		),
	),
)); ?>
