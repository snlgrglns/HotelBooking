<div class="row">
	<div class="col-md-12">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Restro Left Moving Image Form</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form" role="form">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'restro-left-img-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)); ?>

					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<div class="form-group">
						<?php echo $form->labelEx($model,'image'); ?>
						<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>100)); ?>Maximum file size is 250 KB.
						<?php echo $form->error($model,'image'); ?>
					</div>

					<div class="box-footer">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
					</div>

					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!--/.col (right) -->
