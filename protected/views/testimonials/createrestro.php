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
            array('label'=>'Add New', 'url'=>array('testimonials/createrestro')),
            array('label'=>'Manage', 'url'=>array('testimonials/adminrestro')),
        ),
    )
);

?>
    <h1>Add Testimonials for Restro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>