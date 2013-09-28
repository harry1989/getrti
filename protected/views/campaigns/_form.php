<?php
/* @var $this CampaignsController */
/* @var $model Campaigns */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'positions-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'Please submit your ideas on the bill below:'); ?>
		<?php echo $form->textField($model,'statement',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'statement'); ?>
		<?php echo $form->hiddenField($model,'issue_id',array('value'=>$issue_id)); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton('Submit',Yii::app()->createUrl('positions/create',array('user_id'=>1)),array(
		      'type' => 'POST',
		      'dataType' => 'html',
		      'success' => 'function() { $(\'#positions-form\').trigger("reset");}',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

