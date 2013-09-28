<?php
/* @var $this MpPositionOnIssuesController */
/* @var $model MpPositionOnIssues */

$this->breadcrumbs=array(
	'Mp Position On Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MpPositionOnIssues', 'url'=>array('index')),
	array('label'=>'Manage MpPositionOnIssues', 'url'=>array('admin')),
);
?>

<h1>Create MpPositionOnIssues</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>