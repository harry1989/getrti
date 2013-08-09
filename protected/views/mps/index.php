<?php
/* @var $this MpsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mps',
);

$this->menu=array(
	array('label'=>'Create Mps', 'url'=>array('create')),
	array('label'=>'Manage Mps', 'url'=>array('admin')),
);
?>

<h1>Mps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
