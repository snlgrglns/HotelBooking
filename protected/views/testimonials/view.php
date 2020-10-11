<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	$model->name,
);

?>
<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'Create New', 'url'=>array('testimonials/create')),
			array('label'=>'Manage', 'url'=>array('testimonials/admin')),
		),
	)
);

?>
<h1>View Testimonials #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'heading',
		'name',
		'company',
		'image',
		'message',
		'status',
	),
)); ?>
