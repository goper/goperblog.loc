<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Изменить страницу', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить страницу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Менеджер страницы', 'url'=>array('admin')),
);
?>

<h1>Страница #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'name',
		//'content',
        'content' => array(
                    'name' => 'content',
                    'type'=>'html',
                    'value' => $model->content
        ),
		'alias',
	),
)); ?>
