<?php
/* @var $this TestimonialsController */
/* @var $model Testimonials */

$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	'Create',
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
<h1>Add Testimonials for Hotel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>