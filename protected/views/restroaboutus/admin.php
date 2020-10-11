<?php
/* @var $this RestroAboutusController */
/* @var $model RestroAboutus */

$this->breadcrumbs=array(
	'Restro Aboutuses'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restro-aboutus-grid').yiiGridView('update', {
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
			array('label'=>'Manage', 'url'=>array('restroAboutus/admin')),
			array('label'=>'Add New', 'url'=>array('restroAboutus/create')),
		),
	)
);

?>

<h1>Manage Restro About Us</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'restro-aboutus-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	//	'id',
		'heading',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->image))?CHtml::image(Yii::app()->baseUrl . "/images/restro_abtus/$data->id/" . $data->image,"",array("style"=>"height:100px;width:500px;")):"no image"'
		),
		'content',
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
                    'url' => 'CHtml::normalizeUrl(array("restroAboutus/activate/".rawurlencode($data->id)))', //Your URL According to your wish
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