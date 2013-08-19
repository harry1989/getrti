<?php
/* @var $this PositionsController */
/* @var $model Positions */
/* @var $form CActiveForm */
?>


				<div class="row">
					<div class="large-12 columns" >
						<div class="panel_custom" style="border-width: 9px;" id="accordion">							
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'positions-form',
								'enableAjaxValidation'=>true,
								)); ?>
      

						<?php echo $form->textArea($model,'position'); ?>
						<?php echo $form->error($model,'position'); ?>

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
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
						<?php $this->endWidget(); ?>
							  
							</div>
			
						</div>					  
					</div>
				</div>
			</div>

