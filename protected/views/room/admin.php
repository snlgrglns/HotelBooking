<?php
/* @var $this RoomController */
/* @var $model Room */

$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Room', 'url'=>array('index')),
	array('label'=>'Create Room', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#room-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Rooms</h1>
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
$itemStat = array('0'=>'Closed','1'=>'Open');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'room-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'room_type',
		'total_such_room',
		'no_of_person',
		'room_price',
        array(
            'name' => 'status',
            'value' => 'Room::checkStatus($data->status)',
            'filter' => $itemStat,
        ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}{update}{open}{close}{images}{about_room}',
			'buttons' => array(
				'open' => array(
					'label' => 'Open Room',
					'visible'=>'($data->status == 0)?true:false;',
                    'click'=>'function(){if (confirm("Are you sure you want to open this room???!") == true) {return true;} else {return false;}}',
					'url' => 'CHtml::normalizeUrl(array("room/open/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
                'close' => array(
                    'label' => 'Close Room',
                    'visible'=>'($data->status == 1)?true:false;',
                    'click'=>'function(){if (confirm("Are you sure you want to close this room???!") == true) {return true;} else {return false;}}',
                    'url' => 'CHtml::normalizeUrl(array("room/close/".rawurlencode($data->id)))', //Your URL According to your wish
                    'imageUrl' => Yii::app()->baseUrl . '/images/close.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
                ),
				'images' => array(
					'label' => 'Images',
					'visible'=>'($data->status == 1)?true:false;',
					'url' => 'CHtml::normalizeUrl(array("roomImages/create/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/image.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
				'about_room' => array(
					'label' => 'About Room',
					'visible'=>'($data->status == 1)?true:false;',
					'url' => 'CHtml::normalizeUrl(array("room/abtrm/".rawurlencode($data->id)))', //Your URL According to your wish
					'imageUrl' => Yii::app()->baseUrl . '/images/image.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
				),
			),
		),
	),
)); ?>
