<?php
/* @var $this MpPositionOnIssuesController */
/* @var $model MpPositionOnIssues */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mp-position-on-issues-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mp_id'); ?>
		<?php echo $form->textField($model,'mp_id'); ?>
		<?php echo $form->error($model,'mp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_id'); ?>
		<?php echo $form->textField($model,'issue_id'); ?>
		<?php echo $form->error($model,'issue_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'statement'); ?>
		<?php echo $form->textField($model,'statement',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'statement'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->