<div class="admin category view">
    <?php
    /* @var $this CategoryController */
    /* @var $model Category */

    $this->breadcrumbs=array(
        'Дерево категорий'=>array('index'),
        $model->name,
    );

    $this->menu=array(
        array('label'=>'Дерево категорий', 'url'=>array('index')),
        array('label'=>'Создать', 'url'=>array('create')),
        array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Менеджер', 'url'=>array('admin')),
    );
    ?>

    <h1>Вид категории #<?php echo $model->id; ?></h1>

    <? if(Yii::app()->user->hasFlash('category_error')):?>
	<div  class="errorSummary">
		<?=Yii::app()->user->getFlash('category_error'); ?>
	</div>
    <? endif; ?>

    <?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            'id',
            //'lft',
            //'rgt',
            //'level',
            'name',
            'alias',
            'title',
            'meta_k',
            'meta_d',
            'img',
            'order',
            'show',
            'txt' => array(
                'name' => 'txt',
                'type'=>'html',
            ),
            'cssclass',
            'htmlview',
            'Предки' => array(
                'name' => 'Предки',
                'type'=>'html',
                'value' => implode('->',$arr_ancestors),
            ),
        ),
    )); ?>
</div>
