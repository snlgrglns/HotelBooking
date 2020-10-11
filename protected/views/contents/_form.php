<?php
/* @var $this ContentsController */
/* @var $model Contents */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Slider Form</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form" role="form">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'contents-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    )); ?>
                    <div class="row-fluid">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'type'); ?>
                            <?php echo $form->dropDownList($model,'type',array('welcome'=>'Welcome Note','about'=>'About Us','gallery'=>'Gallery Note','tariff'=>'Tariff Note'), array('prompt'=>'Select One','class'=>'form-control')); ?>
                            <?php echo $form->error($model,'type'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'heading'); ?>
                            <?php echo $form->textField($model,'heading',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
                            <?php echo $form->error($model,'heading'); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'content'); ?>
                            <?php
                            $this->widget(
                                'bootstrap.widgets.TbCKEditor',
                                array(
                                    'model'=>$model,
                                    'id' =>'c',
                                    'name' => 'c',
                                    'value' => $model->content,
                                    'editorOptions' => array(
                                        // From basic `build-config.js` minus 'undo', 'clipboard' and 'about'
                                    )
                                )
                            );
                            ?>
                            <?php echo $form->error($model,'content'); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="box-footer">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
                        </div>
                    </div>

                    <?php $this->endWidget(); ?>

                </div><!-- form -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!--/.col (right) -->
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'c', {
        filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash'
    });
</script>