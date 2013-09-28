<?php
/* @var $this MpPositionOnIssuesController */
/* @var $model MpPositionOnIssues */

$this->breadcrumbs=array(
	'Mp Position On Issues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MpPositionOnIssues', 'url'=>array('index')),
	array('label'=>'Create MpPositionOnIssues', 'url'=>array('create')),
	array('label'=>'Update MpPositionOnIssues', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MpPositionOnIssues', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MpPositionOnIssues', 'url'=>array('admin')),
);
?>

<h1>View MpPositionOnIssues #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mp_id',
		'issue_id',
		'position',
		'statement',
		'id',
	),
)); ?>
