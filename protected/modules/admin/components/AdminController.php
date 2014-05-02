<?php

class AdminController extends Controller
{
	public $layout = '/layouts/column2';


    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array(),
                'roles'=>array('admin'),
            ),

            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    protected function beforeAction($action)
    {
        parent::beforeAction($action);
        // подключаем клиентские скрипты
        $cs = Yii::app()->clientScript;

        $cs->registerCssFile(Yii::app()->request->baseUrl . '/css/core/libs/jquery.treeview.css');
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/core/libs/functions.js',CClientScript::POS_END);
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/core/libs/jquery.cookie.js',CClientScript::POS_END);
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/core/libs/jquery.treeview.js',CClientScript::POS_END);
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/core/admin/plugins.js',CClientScript::POS_END);
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/core/admin/script.js',CClientScript::POS_END);

        return true;
    }
}