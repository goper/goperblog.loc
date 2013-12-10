<?php

class IndexController extends Controller {
    public function actionIndex() {
        $this->render('index', array(
            'page' => $this->loadModel('main'),
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