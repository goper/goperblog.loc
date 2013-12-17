<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Юзеры'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список юзеров', 'url'=>array('index')),
	array('label'=>'Создать юзера', 'url'=>array('create')),
	array('label'=>'Изменить юзера', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить юзера', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Уверены?')),
	array('label'=>'Менеджер юзеров', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
        'date' => array(
            'name' => 'date',
            'type'=>'html',
            'value' => date('d.m.Y',$model->date)
        ),
		'email',
        'ban' => array(
            'name' => 'ban',
            'value' => $model->ban == 1 ? "Да" : "Нет",
        ),
        'role' => array(
            'name' => 'role',
            'type'=>'html',
            'value' => $model->role == 1 ? "Админ" : ($model->role == 2 ? "Менеджер" : "Никто"),
        ),
	),
)); ?>