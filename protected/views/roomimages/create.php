<?php
/* @var $this RoomImagesController */
/* @var $model RoomImages */

$this->breadcrumbs=array(
	'Room Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage RoomImages', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model,'room_name'=>$room_name)); ?>

<h1>Manage <?php echo strtoupper($room_name); ?> Images</h1>
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
$stat = array('0'=>'Not Active', '1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'room-images-grid',
	'dataProvider'=>$modelsrch->search(),
	'filter'=>$modelsrch,
	'columns'=>array(
//		'id',
//		'room_id',
//		array( 'name'=>'roomType', 'value'=>'$data->room? $data->room->room_type: "-"' ),
//		'image',
		array(
			'type' => 'raw',
			'value' => '(!empty($data->image))?CHtml::image(Yii::app()->baseUrl . "/images/roomImages/thumbs/" . $data->image,"",array("style"=>"width:100px;")):"no image"'
		),
//		'image_status',
		array(
			'name'=>'image_status',
			'value'=>'RoomImages::stat($data->image_status)',
			'filter'=>$stat
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{activate}{deactivate}{delete}',
			'buttons' => array(
				'activate' => array(
					'label' => 'Activate',
					'visible'=>'($data->image_status == 0)?true:false;',
					'click'=>'function(){if (confirm("Are you sure you want to activate this image???!") == true) {return true;} else {return false;}}',
					'url' => 'CHtml::normalizeUrl(array("roomimages/activate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
				'deactivate' => array(
					'label' => 'DeActivate',
					'visible'=>'($data->image_status == 1)?true:false;',
					'click'=>'function(){if (confirm("Are you sure you want to deactivate this image???!") == true) {return true;} else {return false;}}',
					'url' => 'CHtml::normalizeUrl(array("roomimages/deactivate/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/close.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
			),
		),
	),
)); ?>
