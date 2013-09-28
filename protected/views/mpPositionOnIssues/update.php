<?php
/* @var $this MpPositionOnIssuesController */
/* @var $model MpPositionOnIssues */

$this->breadcrumbs=array(
	'Mp Position On Issues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MpPositionOnIssues', 'url'=>array('index')),
	array('label'=>'Create MpPositionOnIssues', 'url'=>array('create')),
	array('label'=>'View MpPositionOnIssues', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MpPositionOnIssues', 'url'=>array('admin')),
);
?>

<h1>Update MpPositionOnIssues <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>