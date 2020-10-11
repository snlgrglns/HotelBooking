<?php
/* @var $this RestroLeftImgController */
/* @var $model RestroLeftImg */

$this->breadcrumbs=array(
	'Restro Left Imgs'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restro-left-img-grid').yiiGridView('update', {
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
            array('label'=>'All', 'url'=>array('restroLeftImg/admin')),
            array('label'=>'Add New', 'url'=>array('restroLeftImg/create')),
        ),
    )
);

?>
<h1>Manage Restro Left Imgs</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'restro-left-img-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->image))?CHtml::image(Yii::app()->baseUrl . "/images/restro_left_img/$data->id/" . $data->image,"",array("style"=>"width:100px;")):"no image"'
		),
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
					'url' => 'CHtml::normalizeUrl(array("restroLeftImg/activate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
				'deactivate' => array(
					'label' => 'De-Activate',
					'visible'=>'($data->status == 1)?true:false;',
					'url' => 'CHtml::normalizeUrl(array("restroLeftImg/deactivate/".rawurlencode($data->id)))', //Your URL According to your wish
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
