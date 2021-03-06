<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/form.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo">Админка::<?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div>
    <!-- header -->

    <div id="mainmenu">
        <?php
        $this->widget('ext.zii.widgets.Menu', array(
            'items' => array(
                array('label' => 'Главная', 'url' => '/admin/default'),
                array('label' => 'Страницы', 'url' => '/admin/page'),
                array('label' => 'Категории', 'url' => '/admin/category'),
                array('label' => 'Документы', 'url' => '/admin/doc'),
                array('label' => 'Пользователи', 'url' => '/admin/user'),
                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => '/site/logout', 'visible' => !Yii::app()->user->isGuest)
            ),
        ));
        ?>
    </div>
    <!-- mainmenu -->
    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
            'homeLink'=>CHtml::link('Главная','/admin' ),
        ));
        ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> goper@tut.by<br/>
    </div>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>
