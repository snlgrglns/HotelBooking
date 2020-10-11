<?php
/* @var $this BookedRoomController */
/* @var $model BookedRoom */

$this->breadcrumbs=array(
	'Booked Rooms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BookedRoom', 'url'=>array('index')),
	array('label'=>'Create BookedRoom', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#booked-room-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Booked Rooms</h1>

<?php
$stat = array('0'=>'New Book', '1'=>'Confirmed', '2'=>'Cancelled');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'booked-room-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'br_id',
//        array( 'name'=>'custName', 'value'=>'$data->cust? $data->cust->first_name: "-"' ),
        array(
            'name' => 'custName',
            'value' => 'ucwords($data->getFullName())',
        ),

        array( 'name'=>'roomType', 'value'=>'$data->room? $data->room->room_type: "-"' ),
//		'customer_id',
//		'room_type',
		'no_of_room',
		'no_of_adults',

		'no_of_childs',
		'check_in',
		'check_out',
//		'room_status',
        array(
            'name'=>'room_status',
            'value'=>'BookedRoom::stat($data->room_status)',
            'filter'=>$stat
        ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label' => 'View',
                    'url' => 'CHtml::normalizeUrl(array("customerInfo/view/".rawurlencode($data->customer_id)))', //Your URL According to your wish
                ),
            ),
		),
	),
)); ?>
