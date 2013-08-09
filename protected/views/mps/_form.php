<?php
/* @var $this MpsController */
/* @var $model Mps */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mps-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model,'dob',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'party'); ?>
		<?php echo $form->textField($model,'party',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'party'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'constituency'); ?>
		<?php echo $form->textField($model,'constituency',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'constituency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_address'); ?>
		<?php echo $form->textField($model,'p_address',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'p_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_telephone'); ?>
		<?php echo $form->textField($model,'p_telephone',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'p_telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_address'); ?>
		<?php echo $form->textField($model,'d_address',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'d_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_telephone'); ?>
		<?php echo $form->textField($model,'d_telephone',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'d_telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'house'); ?>
		<?php echo $form->textField($model,'house',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'house'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->