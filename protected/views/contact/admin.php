<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Contact', 'url'=>array('index')),
	array('label'=>'Create Contact', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Contact Us Messages</h1>

<?php
$itemView = array('0'=>'Not Viewed','1'=>'Viewed');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
	    'type',
		'name',
		'email',
		'subject',
		'message',
		'received_on',
        array(
            'name' => 'status',
            'value' => 'Contact::checkView($data->status)',
            'filter' => $itemView,
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
