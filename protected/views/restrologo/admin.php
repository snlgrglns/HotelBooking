<?php
/* @var $this RestroLogoController */
/* @var $model RestroLogo */

$this->breadcrumbs=array(
	'Restro Logos'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restro-logo-grid').yiiGridView('update', {
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
			array('label'=>'All', 'url'=>array('restroLogo/admin')),
			array('label'=>'Add New', 'url'=>array('restroLogo/create')),
		),
	)
);
?>
<h1>Manage Restro Logo</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'restro-logo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
//		'logo',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->logo))?CHtml::image(Yii::app()->baseUrl . "/images/restro_logo/$data->id/" . $data->logo,"",array("style"=>"width:100px;")):"no logo"'
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
					'url' => 'CHtml::normalizeUrl(array("restroLogo/activate/".rawurlencode($data->id)))', //Your URL According to your wish
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
