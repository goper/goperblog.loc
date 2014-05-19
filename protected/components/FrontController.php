<?php

class FrontController extends Controller
{
    public $layout='//layouts/column1';


    protected function beforeAction($action)
    {
        Yii::app()->bootstrap->register();
        // подключаем клиентские скрипты
        $cs = Yii::app()->clientScript;

        if(YII_DEBUG){
            $cs->registerCssFile(Yii::app()->request->baseUrl . '/css/widget.css');
            $cs->registerCssFile(Yii::app()->request->baseUrl . '/css/style.css');
            $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/core/libs/functions.js', CClientScript::POS_END);
            $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/plugins.js', CClientScript::POS_END);
            $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/script.js', CClientScript::POS_END);
        }
        else{
            $cs->registerCssFile(Yii::app()->request->baseUrl . '/css/prodaction.min.css');
            $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/prodaction.min.js', CClientScript::POS_END);
        }

        return parent::beforeAction($action);
    }
}