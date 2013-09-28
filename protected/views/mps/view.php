<?php
/* @var $this MpsController */
/* @var $model Mps */

$this->breadcrumbs=array(
	'Mps'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Mps', 'url'=>array('index')),
	array('label'=>'Create Mps', 'url'=>array('create')),
	array('label'=>'Update Mps', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mps', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mps', 'url'=>array('admin')),
);
?>

<h1>View Mps #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'dob',
		'party',
		'constituency',
		'state',
		'p_address',
		'p_telephone',
		'd_address',
		'd_telephone',
		'email',
		'house',
		'id',
	),
)); ?>
