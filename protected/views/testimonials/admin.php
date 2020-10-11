<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#testimonials-grid').yiiGridView('update', {
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
            array('label'=>'Add New', 'url'=>array('testimonials/create')),
            array('label'=>'Manage', 'url'=>array('testimonials/admin')),
        ),
    )
);

?>
<h1>Manage Testimonials For Hotel</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'testimonials-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'heading',
		'name',
		'company',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->image))?CHtml::image(Yii::app()->baseUrl . "/images/testimonials/$data->id/" . $data->image,"",array("style"=>"width:100px;")):"no logo"'
		),
		'message',
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
                    'url' => 'CHtml::normalizeUrl(array("testimonials/activate/".rawurlencode($data->id)))', //Your URL According to your wish
                    'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
                ),
                'deactivate' => array(
                    'label' => 'DeActivate',
                    'visible'=>'($data->status == 1)?true:false;',
                    'url' => 'CHtml::normalizeUrl(array("testimonials/deactivate/".rawurlencode($data->id)))', //Your URL According to your wish
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
