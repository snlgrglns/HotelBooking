<div class="row">
	<div class="col-md-12">
		<!-- general form elements disabled -->
		<div class="box box-warning">
			<div class="box-header">
				<h3 class="box-title">Restro Menu Items</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="form" role="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'restro-menu-items-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
					)); ?>
                    <?php if(Yii::app()->user->hasFlash('error')){ ?>

                        <div class="flash-error">
                            <?php echo Yii::app()->user->getFlash('error'); ?>
                        </div>

                    <?php } ?>

					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'category_id'); ?>
                            <?php echo CHtml::activeDropDownList($model, 'category_id', CHtml::listData(RestroMenuCategory::model()->findAllByAttributes(array('status'=>1)), 'id', 'category_name'), array('prompt' => '--please select--', 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'category_id'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'item_name'); ?>
							<?php echo $form->textField($model,'item_name',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'item_name'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'sub_title'); ?>
							<?php echo $form->textField($model,'sub_title',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
							<?php echo $form->error($model,'sub_title'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'image'); ?>
							<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
							<?php echo $form->error($model,'image'); ?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="form-group">
							<?php echo $form->labelEx($model,'price'); ?>
							<?php echo $form->textField($model,'price',array('class'=>'form-control')); ?>
							<?php echo $form->error($model,'price'); ?>
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