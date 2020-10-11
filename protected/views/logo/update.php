<?php
/* @var $this LogoController */
/* @var $model Logo */

$this->breadcrumbs=array(
	'Logos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Logo', 'url'=>array('index')),
	array('label'=>'Create Logo', 'url'=>array('create')),
	array('label'=>'View Logo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Logo', 'url'=>array('admin')),
);
?>

<h1>Update Logo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>