<?php
/* @var $this DocController */
/* @var $model Doc */

$this->breadcrumbs=array(
	'Docs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Doc', 'url'=>array('index')),
	array('label'=>'Manage Doc', 'url'=>array('admin')),
);
?>

<h1>Create Doc</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>