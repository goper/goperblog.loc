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
<?=$root->name?>
<a class="view" title="View" href="/admin/category/view/id/1"><img src="/assets/b2105d5d/gridview/view.png" alt="View"></a>
<a class="update" title="Update" href="/admin/category/update/id/1"><img src="/assets/b2105d5d/gridview/update.png" alt="Update"></a>
<a class="delete" title="Delete" href="/admin/category/delete/id/1"><img src="/assets/b2105d5d/gridview/delete.png" alt="Delete"></a>
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
        <a href="/admin/prcategory/edit/<?=$category->id?>"><i class="icon-edit"></i></a>
        <span class="remove"><a href="/admin/prcategory/remove/<?=$category->id?>"><i class="icon-remove"></i></a></span>
        <?
        $level=$category->level;
        }

        ?>
        <? for($i=$level;$i;$i--): ?>
    </li>
    </ul>
<? endfor;?>
    <div class="add">
        <a href="/admin/prcategory/add/" class="btn ">Добавить категорию</a>
    </div>

