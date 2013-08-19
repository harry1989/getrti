<?php
/* @var $this PositionsController */
/* @var $model Positions */
/* @var $form CActiveForm */
?>


				<div class="row">
					<div class="large-12 columns panel_custom"  style="border-width: 9px;" id="" >
						     <?php $form=$this->beginWidget('CActiveForm', array(
						     	   	'id'=>'positions-form',
									'enableAjaxValidation'=>false,
									)); ?>
      
							<?php echo $form->textArea($position,'statement'); ?>
							<?php echo $form->error($position,'position'); ?>

							<div class="voteRadio">
      							     
							     <label for="For">							
							       	     <?php echo $form->radioButton($position,'position',array('value'=>1,'uncheckValue'=>null)); ?>
							      For </label>
							      <label for="Against">							
							       	     <?php echo $form->radioButton($position,'position',array('value'=>0,'uncheckValue'=>null)); ?>
							      Against </label>

						<?php echo CHtml::submitButton($position->isNewRecord ? 'Create' : 'Save'); ?>
						<?php $this->endWidget(); ?>
							  
							</div>
			

					</div>
				</div>


