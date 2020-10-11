<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Staff'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#staff-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Staff</h1>
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
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'staff-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->image))?CHtml::image(Yii::app()->baseUrl . "/images/staff/$data->id/" . $data->image,"",array("style"=>"width:100px;")):"no logo"'
		),
		'post',
		'fb_link',
		'twitter_link',
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
					'url' => 'CHtml::normalizeUrl(array("staff/activate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
				'deactivate' => array(
					'label' => 'DeActivate',
					'visible'=>'($data->status == 1)?true:false;',
					'url' => 'CHtml::normalizeUrl(array("staff/deactivate/".rawurlencode($data->id)))', //Your URL According to your wish
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
