<?php
/* @var $this UserController */
/* @var $model User */


$this->menu=array(
	array('label'=>'Журнал юзеров', 'url'=>array('index')),
	array('label'=>'Создать юзера', 'url'=>array('create')),
	array('label'=>'Просмотр юзера', 'url'=>array('view', 'id'=>$model->id)),
 
);
?>
<p>Укажите новый пароль</p>
<?php 
//echo CHtml::form();
//echo CHtml::textField('password');
//echo CHtml::submitButton('Изменить');
//echo CHtml::endForm();
?>
<?php $this->renderPartial('_form_password', array('model'=>$model)); ?>


