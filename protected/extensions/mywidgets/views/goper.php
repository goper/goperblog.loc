<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'action' => 'site/login',
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <p class="note">Поля с <span class="required">*</span> обязательны для заполнения.</p>

    <?=$form->errorSummary($model); ?>

    <div class="row">
        <?=$form->labelEx($model,'username'); ?>
        <?=$form->textField($model,'username'); ?>
        <?=$form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?=$form->labelEx($model,'password'); ?>
        <?=$form->passwordField($model,'password'); ?>
        <?=$form->error($model,'password'); ?>
    </div>

    <div class="row rememberMe">
        <?=$form->checkBox($model,'rememberMe'); ?>
        <?=$form->label($model,'rememberMe'); ?>
        <?=$form->error($model,'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->