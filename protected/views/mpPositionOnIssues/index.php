<?php
/* @var $this MpPositionOnIssuesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mp Position On Issues',
);

$this->menu=array(
	array('label'=>'Create MpPositionOnIssues', 'url'=>array('create')),
	array('label'=>'Manage MpPositionOnIssues', 'url'=>array('admin')),
);
?>

<h1>Mp Position On Issues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
