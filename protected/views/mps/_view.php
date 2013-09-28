<?php
/* @var $this MpsController */
/* @var $data Mps */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('party')); ?>:</b>
	<?php echo CHtml::encode($data->party); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('constituency')); ?>:</b>
	<?php echo CHtml::encode($data->constituency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_address')); ?>:</b>
	<?php echo CHtml::encode($data->p_address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('p_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->p_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_address')); ?>:</b>
	<?php echo CHtml::encode($data->d_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_telephone')); ?>:</b>
	<?php echo CHtml::encode($data->d_telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('house')); ?>:</b>
	<?php echo CHtml::encode($data->house); ?>
	<br />

	*/ ?>

</div>