<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

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
<h1>Update Testimonials <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>