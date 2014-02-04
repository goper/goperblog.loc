<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Авторизация',
);
?>

<h1>Авторизация</h1>

<p><a href="<?=$this->createUrl('site/registration')?>">Регистрация</a></p>

<p>Заполните форму чтобы войти:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
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
