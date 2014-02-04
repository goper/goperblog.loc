<?php
/* @var $this UserController */
/* @var $model User */


$this->menu=array(
	array('label'=>'Журнал юзеров', 'url'=>array('index')),
	array('label'=>'Создать юзера', 'url'=>array('create')),
	array('label'=>'Просмотр юзера', 'url'=>array('view', 'id'=>$model->id)),
 
);
?>
<p>Укажите новый пароль для пользователя <?=$model->username?></p>

<?php $this->renderPartial('_form_password', array('model'=>$model)); ?>


