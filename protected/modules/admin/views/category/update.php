<div class="admin category update">
    <?php
    /* @var $this CategoryController */
    /* @var $model Category */

    $this->breadcrumbs=array(
        'Дерево категорий'=>array('index'),
        $model->name=>array('view','id'=>$model->id),
        'Изменить',
    );

    $this->menu=array(
        array('label'=>'Дерево категорий', 'url'=>array('index')),
        array('label'=>'Создать', 'url'=>array('create')),
        array('label'=>'Вид', 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>'Менеджер', 'url'=>array('admin')),
    );
    ?>

    <h1>Изменить категорию <?php echo $model->id; ?></h1>

    <?php $this->renderPartial('_form', array(
        'model'=>$model,
        'root' => $root,
        'categories' => $categories,
        'parent_id' => $parent_id,
        'id' => $id,
    )); ?>
</div>