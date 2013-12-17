<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Юзеры',
);

$this->menu=array(
	array('label'=>'Создать юзера', 'url'=>array('create')),
	array('label'=>'Менеджер юзеров', 'url'=>array('admin')),
);
?>

<h1>Пользователи</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
