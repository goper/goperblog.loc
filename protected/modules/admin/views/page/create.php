<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Менеджер страниц', 'url'=>array('admin')),
);
?>

<h1>Создать страницу</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>