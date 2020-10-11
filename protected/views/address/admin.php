<?php
/* @var $this AddressController */
/* @var $model Address */

$this->breadcrumbs=array(
	'Addresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Address', 'url'=>array('index')),
	array('label'=>'Create Address', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#address-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Address</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'address-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'hotel_name',
		'address',
		'phone',
		'mobile',
		'email',
//		'status',
        array(
            'name' => 'status',
            'value' => 'Logo::checkStat($data->status)',
            'filter' => $stat,
        ),
		array(
			'class'=>'CButtonColumn',
            'template' => '{activate}{view}{update}{delete}',
            'buttons' => array(
                'activate' => array(
                    'label' => 'Activate',
                    'visible'=>'($data->status == 0)?true:false;',
                    'url' => 'CHtml::normalizeUrl(array("address/activate/".rawurlencode($data->id)))', //Your URL According to your wish
                    'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
                ),
                'delete' => array(
                    'label' => 'Delete',
                    'visible'=>'($data->status == 0)?true:false;',
                ),
            ),
		),
	),
)); ?>
