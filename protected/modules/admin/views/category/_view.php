<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lft')); ?>:</b>
	<?php echo CHtml::encode($data->lft); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rgt')); ?>:</b>
	<?php echo CHtml::encode($data->rgt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_k')); ?>:</b>
	<?php echo CHtml::encode($data->meta_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_d')); ?>:</b>
	<?php echo CHtml::encode($data->meta_d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order')); ?>:</b>
	<?php echo CHtml::encode($data->order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show')); ?>:</b>
	<?php echo CHtml::encode($data->show); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('txt')); ?>:</b>
	<?php echo CHtml::encode($data->txt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cssclass')); ?>:</b>
	<?php echo CHtml::encode($data->cssclass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('htmlview')); ?>:</b>
	<?php echo CHtml::encode($data->htmlview); ?>
	<br />

	*/ ?>

</div>