<?php
/* @var $this DocController */
/* @var $model Doc */

$this->breadcrumbs=array(
	'Docs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Doc', 'url'=>array('index')),
	array('label'=>'Create Doc', 'url'=>array('create')),
	array('label'=>'Update Doc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Doc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Doc', 'url'=>array('admin')),
);
?>

<h1>View Doc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'tiser',
		'body',
		'category_id',
	),
)); ?>
