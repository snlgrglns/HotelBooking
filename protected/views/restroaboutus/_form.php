<div class="row">
	<div class="col-md-12">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Restro About Us Form</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form" role="form">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'restro-aboutus-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)); ?>

					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'heading'); ?>
							<?php echo $form->textField($model,'heading',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'heading'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'image'); ?>
							<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'image'); ?>
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