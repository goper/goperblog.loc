<?php

class PageController extends Controller {

    /**
     * @var string the index layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

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


    public function actionIndex($alias = null) {
        $page = $this->loadModel($alias);
        $this->metaDescription = $page->metaDescription;
        $this->metaKeywords = $page->metaKeywords;
        $this->render('index', array(
            'page' => $page,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Page the loaded model
     * @throws CHttpException
     */
    public function loadModel($alias) {

        $criteria = new CDbCriteria;
        $criteria->select = '*';  // выбираем только поле 'title'
        $criteria->condition = 'alias=:alias';
        $criteria->params = array(':alias' => $alias);
        $page = Page::model()->find($criteria); // $params не требуется      
        if ($page === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $page;
    }

}
