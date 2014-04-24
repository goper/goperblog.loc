<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Категории',
);

$this->menu=array(
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>Categories</h1>
[<?=$root->id?>] <?=$root->name?>
<a class="view" title="View" href="/admin/category/view/id/<?=$root->id?>">
    <img src="/assets/b2105d5d/gridview/view.png" alt="View">
</a>
<a class="update" title="Update" href="/admin/category/update/id/<?=$root->id?>">
    <img src="/assets/b2105d5d/gridview/update.png" alt="Update">
</a>
<a class="delete" title="Delete" href="/admin/category/delete/id/<?=$root->id?>">
    <img src="/assets/b2105d5d/gridview/delete.png" alt="Delete">
</a>
    <?
    $level=0;
    foreach($categories as $n=>$category)
    {
    if($category->level==$level)
        echo '</li>';
    else if($category->level>$level)
        echo '<ul>';
    else
    {
        echo '</li>';

        for($i=$level-$category->level;$i;$i--)
        {
            echo '</ul>';
            echo '</li>';
        }
    }
    ?>
    <li>
        [<?=$category->id?>] <?=$category->name?>
        <a class="view" title="View" href="/admin/category/view/id/<?=$category->id?>">
            <img src="/assets/b2105d5d/gridview/view.png" alt="View">
        </a>
        <a class="update" title="Update" href="/admin/category/update/id/<?=$category->id?>">
            <img src="/assets/b2105d5d/gridview/update.png" alt="Update">
        </a>
        <a class="delete" title="Delete" href="/admin/category/delete/id/<?=$category->id?>">
            <img src="/assets/b2105d5d/gridview/delete.png" alt="Delete">
        </a>
        <?
        $level=$category->level;
        }

        ?>
        <? for($i=$level;$i;$i--): ?>
    </li>
    </ul>
<? endfor;?>
    <div class="add">
        <a href="<?= Yii::app()->createUrl('/admin/category/create') . '/' ?>" class="btn ">Добавить категорию</a>
    </div>

