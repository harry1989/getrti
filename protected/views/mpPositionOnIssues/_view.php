<?php
/* @var $this MpPositionOnIssuesController */
/* @var $data MpPositionOnIssues */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mp_id')); ?>:</b>
	<?php echo CHtml::encode($data->mp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issue_id')); ?>:</b>
	<?php echo CHtml::encode($data->issue_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('statement')); ?>:</b>
	<?php echo CHtml::encode($data->statement); ?>
	<br />


</div>