<div class="admin category index">
<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Дерево категорий',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Менеджер', 'url'=>array('admin')),
);
?>
<h1>Дерево категорий</h1>
[<?=$root->id?>] <?=$root->name?>
<a class="view" title="View" href="<?=Yii::app()->createUrl('/admin/category/view', array('id'=>$root->id))?>"><img src="/assets/b2105d5d/gridview/view.png" alt="View"></a>
<a class="update" title="Update" href="<?=Yii::app()->createUrl('/admin/category/update', array('id'=>$root->id))?>"><img src="/assets/b2105d5d/gridview/update.png" alt="Update"></a>
    <?php echo CHtml::link('<img src="/assets/b2105d5d/gridview/delete.png" alt="Delete">',"#", array("submit"=>array('delete', 'id'=>$root->id), 'confirm' => 'Are you sure?')); ?>
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
        <a class="view" title="View" href="<?=Yii::app()->createUrl('/admin/category/view', array('id'=>$category->id))?>"><img src="/assets/b2105d5d/gridview/view.png" alt="View"></a>
        <a class="update" title="Update" href="<?=Yii::app()->createUrl('/admin/category/update', array('id'=>$category->id))?>"><img src="/assets/b2105d5d/gridview/update.png" alt="Update"></a>
        <?php echo CHtml::link('<img src="/assets/b2105d5d/gridview/delete.png" alt="Delete">',"#", array("submit"=>array('delete', 'id'=>$category->id), 'confirm' => 'Are you sure?')); ?>
        <?
        $level=$category->level;
        }

        ?>
        <? for($i=$level;$i;$i--): ?>
    </li>
    </ul>
<? endfor;?>
</div>