<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_k'); ?>
		<?php echo $form->textField($model,'meta_k',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'meta_k'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_d'); ?>
		<?php echo $form->textArea($model,'meta_d',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order'); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show'); ?>
		<?php echo $form->textField($model,'show'); ?>
		<?php echo $form->error($model,'show'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		<?php echo $form->textArea($model,'txt',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'txt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cssclass'); ?>
		<?php echo $form->textField($model,'cssclass',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'cssclass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'htmlview'); ?>
		<?php echo $form->textField($model,'htmlview',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'htmlview'); ?>
	</div>

    <div class="row">

        <?php echo $form->labelEx($model,'parent_id'); ?>
        <select name="Category[parent_id]" id="Category_parent">
            <option value="<?=$root->id ?>"><?=$root->name?></option>
            <? if (!empty($categories)) : ?>
                <? foreach ($categories as $category) : ?>
                        <option value="<?=$category->id ?>"
                            <?=!empty($_POST['parent']) && $_POST['parent']== $category->id || $parent_id == $category->id? 'selected="selected"' : ''?>>
                            <?=str_repeat('-', $category->level), $category->name?>
                        </option>
                <? endforeach; ?>
            <? endif;?>
        </select>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->