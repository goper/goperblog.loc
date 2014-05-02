<?php

class Controller extends CController
{
    public $menu = array();
    public $breadcrumbs = array();

    protected function beforeAction($action)
    {
        parent::beforeAction($action);

        Yii::app()->getClientScript()->registerCoreScript('jquery');

        return true;
    }
}