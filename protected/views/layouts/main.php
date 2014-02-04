<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
    <?php Yii::app()->bootstrap->register(); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
    <meta name="description" content="<?php echo empty($this->metaDescription) ? '' : $this->metaDescription?>" />
    <meta name="keywords" content="<?php echo empty($this->metaKeywords) ? '' : $this->metaKeywords?>" />
</head>

<body>

<div class="container" id="page">
    <header>
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </header>
    <!-- header -->

    <?php $this->widget('bootstrap.widgets.TbNavbar', array(
        'type'=>'null', // null or 'inverse'
        'brand'=> false,
        'brandUrl'=>'/',
        'fixed' => false,
        //'collapse'=>true, // requires bootstrap-responsive.css
        'items'=>array(
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'items'=>array(
                    array('label'=>'', 'url'=> '/', 'icon'=>'home'),
                    array('label'=>'', 'url'=>'/contact', 'icon'=>'envelope'),
                ),
            ),
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'htmlOptions'=>array('class'=>'pull-right'),
                'items'=>array(
                    array('label'=>'', 'icon'=>'user', 'url'=>'/site/', 'visible' => Yii::app()->user->isGuest, 'items'=>array(
                        array('label' => 'Вход', 'url' => '/site/login', 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Регистрация', 'url' => '/site/registration', 'visible' => Yii::app()->user->isGuest),
                    )),
                    array('label' => '', 'icon'=>'wrench', 'url' => '/admin', 'visible' => Yii::app()->user->name === 'admin'),
                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'icon' => 'lock', 'visible' => !Yii::app()->user->isGuest),
                ),
            ),
        ),
    )); ?>
    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        ));
        ?>
    <!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>



    <footer style="clear: both">
        Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>

        <?php
        //$this->widget('ext.mywidgets.Goper');
        ?>

    </footer>

</div>
<!-- page -->
</body>
</html>
