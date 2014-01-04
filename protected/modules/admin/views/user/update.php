<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Юзеры'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Изменить',
);
$this->menu=array(
    array('label'=>'Изменить пароль', 'url'=>array('password','id'=>$model->id)),
	array('label'=>'Списко юзеров', 'url'=>array('index')),
	array('label'=>'Создать юзера', 'url'=>array('create')),
	array('label'=>'Вид юзера', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Менеджер юзеров', 'url'=>array('admin')),
);
?>
<h1>Имзенить юзера '<i><?php echo $model->username; ?></i>'</h1>
<?php $this->renderPartial('_form_update', array('model'=>$model)); ?>