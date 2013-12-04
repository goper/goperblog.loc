<?php
$this->breadcrumbs = array(
    $page_contact->title,
);
?>

<h1><?= $page_contact->name ?></h1>

<article>
    <?= $page_contact->content ?>
</article>

<?php if (Yii::app()->user->hasFlash('contact')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>
<?php else: ?>

    <div class="form">
        <?php echo CHtml::beginForm(); ?>

        <?php echo CHtml::errorSummary($model); ?>

        <div class="row">
            <?php echo CHtml::activeLabel($model, 'user'); ?>
            <?php echo CHtml::activeTextField($model, 'user'); ?>
        </div>

        <?php if (CCaptcha::checkRequirements() && Yii::app()->user->isGuest): ?>
            <?= CHtml::activeLabelEx($model, 'verifyCode') ?>
            <?php $this->widget('CCaptcha') ?>
            <?= CHtml::activeTextField($model, 'verifyCode') ?>
        <?php endif ?>

        <div class="row submit">
            <?php echo CHtml::submitButton('Отправить'); ?>
        </div>

        <?php echo CHtml::endForm(); ?>
    </div><!-- form -->

<?php endif; ?>





