<?php
/* @var $this RoomImagesController */
/* @var $model RoomImages */

$this->breadcrumbs=array(
	'Room Images'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#room-images-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Images</h1>

<?php
$stat = array('0'=>'Not Active', '1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'room-images-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
//		'room_id',
        array( 'name'=>'roomType', 'value'=>'$data->room? $data->room->room_type: "-"' ),
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
			'template' => '{delete}',
		),
	),
)); ?>
