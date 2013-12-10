<?php
/* @var $this PageController */
/* @var $data Page */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<i title="<?php echo trim(strip_tags($data->content)) ?>"><?php echo CHtml::encode($data->getAttributeLabel('content')); ?></i>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('show')); ?>:</b>
    <?php echo $data->show == 1 ? 'Да' : 'Нет'; ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
    <?php echo date('d.m.Y',$data->date)?>
    <br />


</div>