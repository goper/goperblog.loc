<?php

class CategoryController extends AdminController
{

    //private $root = array();
    //private $descendants = array();

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
            $parent_id = (int)$_POST['Category']['parent_id'];
            $root = Category::model()->findByPk($parent_id);
            $model->attributes = $_POST['Category'];
            if($model->appendTo($root)){
                $this->redirect(array('view','id'=>$model->id));
            }
        }

		$this->render('create',array(
			'model'=>$model,
            'root' => $root,
            'categories' => $descendants,
            'parent_id' => null,
            'id' => null,
		));
	}


	public function actionUpdate($id)
	{
        $root = Category::getRoot(new Category);
        $descendants = $root->descendants()->findAll();

		$model = $this->loadModel($id);

        $parent = $model->parent()->find();
        $parent_id = $parent ? $parent->id : null;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
            $parent_id = (int)$_POST['Category']['parent_id'];

            $node = Category::model()->findByPk($parent_id);

			$model->attributes = $_POST['Category'];

            if($model->lft == 1 || $model->id == $node->id){
                if($model->saveNode()){
                    Yii::app()->user->setFlash('category_error', "Родитель не может стать потомком себя самого! Структура дерева не изменена.");
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
            else{
                if($model->saveNode()){
                    if($node->isDescendantOf($model)){
                        Yii::app()->user->setFlash('category_error', "Родитель не может стать потомком своих детей! Структура дерева не изменена.");
                    }
                    else{
                        $model->moveAsLast($node);
                    }
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}

		$this->render('update',array(
			'model'=> $model,
            'root' => $root,
            'categories' => $descendants,
            'parent_id' => $parent_id,
            'id' => $id,
		));
	}


	public function actionDelete($id)
	{
		$this->loadModel($id)->deleteNode();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
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
