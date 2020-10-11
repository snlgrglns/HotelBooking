<?php
/* @var $this TestimonialsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Testimonials',
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
<h1>Testimonials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
