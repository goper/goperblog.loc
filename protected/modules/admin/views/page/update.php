<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Вид страницы', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Менеджер страниц', 'url'=>array('admin')),
);
?>

<h1>Изменить страницу <i>'<?php echo $model->name; ?>'</i></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>