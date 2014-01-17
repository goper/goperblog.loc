<?php
/* @var $this DocController */
/* @var $model Doc */

$this->breadcrumbs=array(
	'Docs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Doc', 'url'=>array('index')),
	array('label'=>'Create Doc', 'url'=>array('create')),
	array('label'=>'View Doc', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Doc', 'url'=>array('admin')),
);
?>

<h1>Update Doc <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>