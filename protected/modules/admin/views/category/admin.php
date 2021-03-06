<div class="admin category admin">
<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Дерево категорий'=>array('index'),
	'Менеджер',
);

$this->menu=array(
	array('label'=>'Дерево', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

?>

<h1>Менеджер категорий</h1>

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
</div>
