<?php

class IndexController extends FrontController {

    public function actionIndex() {

        // actionIndex вызывается всегда, когда action не указан явно.

        $input = Yii::app()->request->getPost('input');
        // для примера будем приводить строку к верхнему регистру
        $output = mb_strtoupper($input, 'utf-8');

        // если запрос асинхронный, то нам нужно отдать только данные
        if(Yii::app()->request->isAjaxRequest){
            echo CHtml::encode($output);
            // Завершаем приложение
            Yii::app()->end();
        }
        else {
            // если запрос не асинхронный, отдаём форму полностью
            $this->render('index', array(
                'input'=>$input,
                'output'=>$output,
            ));
        }

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