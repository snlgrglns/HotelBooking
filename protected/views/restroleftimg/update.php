<?php
/* @var $this RestroLeftImgController */
/* @var $model RestroLeftImg */

$this->breadcrumbs=array(
	'Restro Left Imgs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>
<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'All', 'url'=>array('restroLeftImg/admin')),
			array('label'=>'Add New', 'url'=>array('restroLeftImg/create')),
		),
	)
);

?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>