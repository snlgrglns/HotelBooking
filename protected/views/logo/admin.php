<?php
/* @var $this LogoController */
/* @var $model Logo */

$this->breadcrumbs=array(
	'Logos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Logo', 'url'=>array('index')),
	array('label'=>'Create Logo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#logo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Logos</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'logo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
//		'logo',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->logo))?CHtml::image(Yii::app()->baseUrl . "/images/logo/$data->id/" . $data->logo,"",array("style"=>"width:100px;")):"no logo"'
		),
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
                    'url' => 'CHtml::normalizeUrl(array("logo/activate/".rawurlencode($data->id)))', //Your URL According to your wish
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
