<div class="row">
	<div class="col-md-12">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Restro Menu Category</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form" role="form">

					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'restro-menu-category-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>

					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'category_name'); ?>
							<?php echo $form->textField($model,'category_name',array('size'=>90,'maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'category_name'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="box-footer">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
						</div>
					</div>

					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div><!-- form -->
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div><!--/.col (right) -->