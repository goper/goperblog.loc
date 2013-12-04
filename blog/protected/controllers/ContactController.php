<?php

class ContactController extends Controller {
    
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'users' => array('*'),
            ),
        );
    }
    
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            
        );
    }


    /**
     * Lists all models.
     */
    public function actionIndex() { 
        
        $model = new ContactForm;
        
        if(!empty($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if($model->validate()) {
                Yii::app()->user->setFlash('contact', 'Отправлено!');
            }
        }
        
        $this->render('index', array(
            'page_contact' => $this->loadModel(),
            'model' => $model,
        ));
    }
    
    

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Page the loaded model
     * @throws CHttpException
     */
    public function loadModel() {

        $criteria = new CDbCriteria;
        $criteria->select = '*';  // выбираем только поле 'title'
        $criteria->condition = 'alias=:alias';
        $criteria->params = array(':alias' => 'contact');
        $page = Page::model()->find($criteria); // $params не требуется      
        if ($page === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $page;
    }

}
