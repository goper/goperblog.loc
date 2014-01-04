<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Юзеры'=>array('index'),
	'Создать',
);
$this->menu=array(
	array('label'=>'Список юзеров', 'url'=>array('index')),
	array('label'=>'Менеджер юзеров', 'url'=>array('admin')),
);
?>
<h1>Создать юзера</h1>
<?php $this->renderPartial('_form_create', array('model'=>$model)); ?>