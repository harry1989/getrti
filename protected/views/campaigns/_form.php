<?php
/* @var $this PositionsController */
/* @var $model Positions */
/* @var $form CActiveForm */
?>


				<div class="row">
					<div class="large-12 columns" >
						<div class="panel_custom" style="border-width: 9px;" id="accordion">							
                                                       <form id="positions-form" action="/test/getrti/index.php?r=positions/create" method="post">

							<textarea name="Positions[statement]" id="Positions_statement" style="width: 100%;" placeholder="Let your MP know how you want him to vote on this bill?"></textarea>

							<div class="voteRadio">
							  <label for="yes">
								<input name="Positions[position]" 
										type="radio"
										id="Positions_position">
										
										Yes</label>
										
							  <label for="no">
							    <input name="Positions[position]" 
										type="radio"
										id="Positions_position">
										No</label>
     </form>
							  
							</div>
			
						</div>					  
					</div>
				</div>
			</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'positions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'statement'); ?>
		<?php echo $form->textField($model,'statement',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'statement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_id'); ?>
		<?php echo $form->textField($model,'issue_id'); ?>
		<?php echo $form->error($model,'issue_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->