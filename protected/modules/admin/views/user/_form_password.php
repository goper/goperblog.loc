<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Поля с <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <label for="User_password" class="required">Пароль <span class="required">*</span></label>
        <input size="60" maxlength="64" name="User[password]" id="User_password" type="password" value="">
    </div>
    <?php echo $form->error($model,'password'); ?>

    <div class="row">
        <label for="User_password2" class="required">Изменить пароль <span class="required">*</span></label>
        <input size="60" maxlength="64" name="User[password2]" id="User_password2" type="password" value="">
    </div>
    <?php echo $form->error($model,'password2'); ?>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->