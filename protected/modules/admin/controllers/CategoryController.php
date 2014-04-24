<?php

class CategoryController extends AdminController
{

    //private $root = array();
    //private $descendants = array();

	public function beforeAction($action){
        return true;
    }

    public function actionView($id)
	{

        $arr_ancestors = array();

        $category = Category::model()->find(array(
            'condition' => 'id=:id',
            'params' => array(':id' => $id),
        ));

        $ancestors = $category->ancestors()->findAll();

        foreach($ancestors as $ancestor){
            $arr_ancestors[] = $ancestor->name;
        }

		$this->render('view',array(
            'arr_ancestors' => $arr_ancestors,
			'model'=>$this->loadModel($id),
		));
	}


	public function actionCreate()
	{
		$model = new Category;

        $root = Category::getRoot($model);
        $descendants = $root->descendants()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
           // html::pr($_POST['Category']);
            //$model->parent_id = $_POST['Category']['parent_id'];
			$model->attributes = $_POST['Category'];


            html::pr($model->attributes,1);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'root' => $root,
            'categories' => $descendants,
		));
	}


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionIndex()
	{
        $model = new Category;
        $root = Category::getRoot($model);
        $descendants = $root->descendants()->findAll();

		$this->render('index',array(
            'root' => $root,
			'categories' => $descendants,
		));
	}


	public function actionAdmin()
	{
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function loadModel($id)
	{
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
