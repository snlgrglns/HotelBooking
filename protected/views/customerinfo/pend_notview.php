<?php
/* @var $this CustomerInfoController */
/* @var $model CustomerInfo */

$this->breadcrumbs=array(
    'Customer Infos'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List CustomerInfo', 'url'=>array('index')),
    array('label'=>'Create CustomerInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-info-grid').yiiGridView('update', {
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
            array('label'=>'All', 'url'=>array('customerInfo/admin')),
            array('label'=>'Not Viewed', 'url'=>array('customerInfo/notviewed')),
            array('label'=>'Pending', 'url'=>array('customerInfo/pending')),
            array('label'=>'Arriving', 'url'=>array('customerInfo/arriving')),
            array('label'=>'Leaving', 'url'=>array('customerInfo/leaving')),
            array('label'=>'Pick Up', 'url'=>array('customerInfo/pickup')),
        ),
    )
);

?>
<h1><?php echo $msg; ?></h1>


<?php
$itemView = array('0'=>'Not Viewed','1'=>'Viewed');
$itemStat = array('0'=>'Pending','1'=>'Booked','2'=>'Cancelled');
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'customer-info-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        //'id',
        'first_name',
        'last_name',
        'phone',
        'country',
        'email1',
//        array( 'name'=>'check_in_date', 'value'=>'$data->booked_room_search? $data->booked_room_search->check_in: "-"' ),
        array(
            'name'=>'check_in_date',
//            'header'=>'check_in_date',
            'value'=>'$data->checkInDate()',
        ),
        array(
            'name'=>'check_out_date',
//            'header'=>'check_in_date',
            'value'=>'$data->checkOutDate()',
        ),
        /*
        'email2',
        'state_province',
        'city',
        'zip_code',
        'flight_details',
        'personal_message',
        'pick_up_at_airport',
        'payment_card_no',
        'status',
        */
        array(
            'class'=>'CButtonColumn',
            'template' => '{view}{update}',
        ),
    ),
)); ?>
