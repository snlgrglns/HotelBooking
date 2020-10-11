<?php
/* @var $this RoomImagesController */
/* @var $model RoomImages */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Images For "<?php echo strtoupper($room_name);?>"</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'room-images-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    )); ?>
                    <div class="row-fluid">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'image'); ?>
                            <?php
                            $this->widget('CMultiFileUpload', array(
                                'model'=>$model,
                                'attribute'=>'image',
                                'accept'=>'jpg|jpeg|gif|png|dcm|dicom',
                                'name' => 'image',
                                'denied'=>'File is not allowed',
                                'max'=>10, // max 10 files
                                'htmlOptions'=>array('class'=>'form-control')
                                /*'options'=>array(
                                    'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
                                    'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
                                    'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
                                    'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
                                    'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
                                    'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
                                )*/
                            ));
                            ?>
                            <?php echo $form->error($model,'image'); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div style="display: none">
                            <?php echo $form->labelEx($model,'image_status'); ?>
                            <?php echo $form->textField($model,'image_status'); ?>
                            <?php echo $form->error($model,'image_status'); ?>
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