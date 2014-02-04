<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Юзеры'=>array('index'),
	'Менеджер',
);

$this->menu=array(
	array('label'=>'Список юзеров', 'url'=>array('index')),
	array('label'=>'Создать юзера', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Менеджер юзеров</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
            'name' => 'id',
            'filter' => false,
        ),
		'username',
        'date' => array(
            'name' => 'date',
            'value' => 'date("d.m.Y", $data->date)',
            'filter' => false,
        ),
        'email',
        'ban' => array(
            'name' => 'ban',
            'value' => '($data->ban == 1 ? "Да" : "Нет")',
            'filter' => array(0 => "Нет", 1 => "Да")
        ),
        'role' => array(
            'name' => 'role',
            'value' => '($data->role == "admin" ? "Админ" : "Юзер")',
            'filter' => array("admin" => "Админ", "user" => "Юзер")
        ),


		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
