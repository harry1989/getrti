<?php
/* @var $this MpsController */
/* @var $model Mps */

$this->breadcrumbs=array(
	'Mps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mps', 'url'=>array('index')),
	array('label'=>'Manage Mps', 'url'=>array('admin')),
);
?>

<h1>Create Mps</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>