<?php
/* @var $this ServicesController */
/* @var $model Services */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Add Services Form</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form clearfix" role="form">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'services-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    )); ?>
                    <div class="row-fluid">
                        <div class="form-group col-md-6">
                            <?php echo $form->labelEx($model,'icon_image'); ?>
                            <?php echo $form->fileField($model,'icon_image',array('maxlength'=>255, 'class'=>'form-control')); ?>Image size must be less than 50KB.
                            <?php if($model->isNewRecord!='1'){ ?>
                                <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/services/'.$model->id.'/'.$model->icon_image,"icon_image",array("width"=>60)); ?>
                            <?php } ?>
                            <?php echo $form->error($model,'icon_image'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo $form->labelEx($model,'heading'); ?>
                            <?php echo $form->textField($model,'heading',array('maxlength'=>50, 'class'=>'form-control')); ?>
                            <?php echo $form->error($model,'heading'); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="form-group col-md-6">
                            <?php echo $form->labelEx($model,'short_description'); ?>
                            <?php echo $form->textField($model,'short_description',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
                            <?php echo $form->error($model,'short_description'); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="form-group col-md-12">
                            <?php echo $form->labelEx($model,'full_description'); ?>
                            <?php
                            $this->widget(
                                'bootstrap.widgets.TbCKEditor',
                                array(
                                    'model'=>$model,
                                    'id' =>'c',
                                    'name' => 'c',
                                    'value' => $model->full_description,
                                    'editorOptions' => array(
                                        // From basic `build-config.js` minus 'undo', 'clipboard' and 'about'
                                    )
                                )
                            );
                            ?>
                            <?php echo $form->error($model,'full_description'); ?>
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
</div>   <!-- /.row -->
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