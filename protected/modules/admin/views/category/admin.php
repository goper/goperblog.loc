<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

?>

<h1>Manage Categories</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'lft',
		//'rgt',
		//'level',
		'name',
		'alias',
        'show',
		/*
		'title',
		'meta_k',
		'meta_d',
		'img',
		'order',
		'show',
		'txt',
		'cssclass',
		'htmlview',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
