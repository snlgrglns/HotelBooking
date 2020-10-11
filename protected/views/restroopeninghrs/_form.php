<style>
	.bootstrap-timepicker-widget table td input {
		width: 40px;
		margin: 0;
		text-align: center;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Restro Opening Hours Form</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form" role="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'restro-opening-hrs-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
					)); ?>

					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'days'); ?>
							<?php echo $form->textField($model,'days',array('size'=>90,'maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'days'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'start_time'); ?>
							<?php $this->widget(
                                'bootstrap.widgets.TbTimePicker',
                                array(
                                    'model' => $model,
                                    'attribute' => 'start_time',
                                    'options' => array(
                                        'showMeridian' => false
                                    ),
                                    'wrapperHtmlOptions' => array('class' => 'form-control'),
                                )
                            );
							?>
							<?php echo $form->error($model,'start_time'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'end_time'); ?>
                            <?php $this->widget(
                                'bootstrap.widgets.TbTimePicker',
                                array(
                                    'model' => $model,
                                    'attribute' => 'end_time',
                                    'options' => array(
                                        'showMeridian' => false
                                    ),
                                    'wrapperHtmlOptions' => array('class' => 'form-control'),
                                )
                            );
                            ?>
							<?php echo $form->error($model,'end_time'); ?>
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