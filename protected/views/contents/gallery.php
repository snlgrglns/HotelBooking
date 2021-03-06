<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
    'Contents'=>array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contents-grid').yiiGridView('update', {
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
            array('label'=>'Create New', 'url'=>array('contents/create')),
            array('label'=>'All', 'url'=>array('contents/admin')),
            array('label'=>'Welcome Note', 'url'=>array('contents/welcome')),
            array('label'=>'About Us', 'url'=>array('contents/about')),
            array('label'=>'Gallery', 'url'=>array('contents/gallery')),
            array('label'=>'Tariff', 'url'=>array('contents/tariff')),
        ),
    )
);

?>
<h1>Manage Welcome Note</h1>

<?php
$stat = array('0'=>'Not Active','1'=>'Active');
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'contents-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
//        'id',
//        'type',
        'heading',
        'content',
        array(
            'name' => 'status',
            'value' => 'Logo::checkStat($data->status)',
            'filter' => $stat,
        ),
        array(
            'class'=>'CButtonColumn',
            'template' => '{activate}{view}{update}{delete}',
            'buttons' => array(
                'activate' => array(
                    'label' => 'Activate',
                    'visible'=>'($data->status == 0)?true:false;',
                    'url' => 'CHtml::normalizeUrl(array("contents/activate/".rawurlencode($data->id)))', //Your URL According to your wish
                    'imageUrl' => Yii::app()->baseUrl . '/images/open.jpg', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
                ),
                'delete' => array(
                    'label' => 'Delete',
                    'visible'=>'($data->status == 0)?true:false;',
                ),
            ),
        ),
    ),
)); ?>
