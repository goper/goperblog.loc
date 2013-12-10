<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
    <?php Yii::app()->bootstrap->register(); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
</head>

<body>

<div class="container" id="page">
    <header>
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </header>
    <!-- header -->

    <?php $this->widget('bootstrap.widgets.TbNavbar', array(
        'type'=>'inverse', // null or 'inverse'
        'brand'=> false,
        'brandUrl'=>'/',
        'fixed' => false,
        //'collapse'=>true, // requires bootstrap-responsive.css
        'items'=>array(
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'items'=>array(
                    array('label'=>'Home', 'url'=>'/'),
                    array('label'=>'Контакты', 'url'=>'/contact'),
                    array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                        array('label'=>'Action', 'url'=>'#'),
                        array('label'=>'Another action', 'url'=>'#'),
                        array('label'=>'Something else here', 'url'=>'#'),
                    )),
                    array('label'=>'Вход', 'url'=>'/site/login'),
                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
            ),
        ),
    )); ?>
    <p></p>
    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        ));
        ?>
    <!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <footer>
        Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </footer>

</div>
<!-- page -->
</body>
</html>
