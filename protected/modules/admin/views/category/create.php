<div class="admin category create">
    <?php
    /* @var $this CategoryController */
    /* @var $model Category */

    $this->breadcrumbs=array(
        'Дерево категорий'=>array('index'),
        'Создать',
    );

    $this->menu=array(
        array('label'=>'Дерево категорий', 'url'=>array('index')),
        array('label'=>'Менеджер', 'url'=>array('admin')),
    );
    ?>

    <h1>Создать категорию</h1>

    <?php $this->renderPartial('_form', array(
        'model'=>$model,
        'root' => $root,
        'categories' => $categories,
        'parent_id' => $parent_id,
        'id' => $id,
        )); ?>
</div>