<?php

class SiteController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow readers only access to the view file
                'actions' => array('login', 'index', 'error', 'registration', 'captcha'),
                'users' => array('*')
                //'roles' => array('user')
            ),
            array('allow', // allow readers only access to the view file
                'actions' => array('logout'),
                'users' => array('@')
            ),
            array('deny', // deny everybody else
                'users' => array('*')
            ),
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: Index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the index 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/Index.php'
        // using the index layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new Login;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['Login'])) {

            $model->attributes = $_POST['Login'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()){
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionRegistration(){
        $model = new Registration;

        if(isset($_POST['Registration'])){

            // Безопасное присваивание значений атрибутам
            $model->attributes = $_POST['Registration'];
            $model->role = 3;
            $model->date = time();
            if($model->validate()){
                if ($model->save()){
                    Yii::app()->user->setFlash('registration', 'Спасибо за регистрацию!');
                    $this->refresh();
                }
            }

        }

        $this->render('registration', array('model' => $model));

    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
