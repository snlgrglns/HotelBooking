<?php
/* @var $this RestroMenuItemsController */
/* @var $model RestroMenuItems */

$this->breadcrumbs=array(
	'Restro Menu Items'=>array('index'),
	'Create',
);
?>
<?php
$this->widget(
	'bootstrap.widgets.TbTabs',
	array(
		'type' => 'tabs', // 'tabs' or 'pills'
		'tabs' => array(
			array('label'=>'Manage', 'url'=>array('restroMenuItems/admin')),
			array('label'=>'Add New', 'url'=>array('restroMenuItems/create')),
		),
	)
);
?>
<h1>Add Menu Items</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>