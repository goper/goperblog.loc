<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs = array(
    'Страницы' => array('index'),
    'Менеджер',
);

$this->menu = array(
    array('label' => 'Список страниц', 'url' => array('index')),
    array('label' => 'Создать страницу', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Менеджер страниц</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'page-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id' => array(
            'name' => 'id',
            'filter' => false,
        ),
        'title',
        'name',

        'alias',
        'date' => array(
            'name' => 'date',
            'value' => 'date("d.m.Y", $data->date)',
            'filter' => false,
        ),
        'show' => array(
            'name' => 'show',
            'value' => '($data->show == 1 ? "Да" : "Нет")',
            'filter' => array(0 => "Нет", 1 => "Да")
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
