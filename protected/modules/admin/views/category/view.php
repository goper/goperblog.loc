<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'lft',
		//'rgt',
		//'level',
		'name',
		'alias',
		'title',
		'meta_k',
		'meta_d',
		'img',
		'order',
		'show',
        'txt' => array(
            'name' => 'txt',
            'type'=>'html',
        ),
		'cssclass',
		'htmlview',
        'Предки' => array(
            'name' => 'Предки',
            'type'=>'html',
            'value' => implode('->',$arr_ancestors),
        ),
	),
)); ?>
