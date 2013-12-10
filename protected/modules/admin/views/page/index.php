<?php
/* @var $this PageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Страницы',
);

$this->menu=array(
	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Менеджер страниц', 'url'=>array('admin')),
);
?>

<h1>Страницы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
