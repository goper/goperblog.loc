<?php

class CategoryController extends Controller {

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


    public function actionIndex($alias) {
        $category1=new Category;
        $category1->name='Ford';
        $category1->alias='Ford';
        $root=Category::model()->findByPk(3);
        $category1->appendTo($root);

        echo $alias;
    }

    public function actionAll() {

        //html::pr($this->get_ancestors_alias('news'),1);

        $criteria=new CDbCriteria;
        $criteria->order='t.lft'; // или 't.root, t.lft' для множественных деревьев
        $categories = Category::model()->findAll($criteria);
        $level=0;

        $this->render('all', array(
            'categories' => $categories,
            'level' => $level,
            'get_ancestors_alias' => function($alias){
                    return $this->get_ancestors_alias($alias);
             }
        ));


    }

    private function get_ancestors_alias($alias){
        $category = Category::model()->find(array(
            'select'=>'*',
            'condition'=>'alias=:alias',
            'params'=>array(':alias'=> $alias),
        ));
        $descendants = $category->ancestors()->findAll();
        $txt = '';
        foreach ($descendants as $v){
            $txt .=  $v->alias . '/';
        }
        return trim($txt, '/');
    }


}
