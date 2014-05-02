<?php

class Category extends CActiveRecord
{
    public $parent_id;

    public function behaviors()
    {
        return array(
            'nestedSetBehavior'=>array(
                'class'=>'application.components.NestedSetBehavior',
                'leftAttribute'=>'lft',
                'rightAttribute'=>'rgt',
                'levelAttribute'=>'level',
            ),
        );
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('alias,name', 'required'),
            array('parent_id', 'numerical', 'integerOnly'=>true),
            array('alias', 'match', 'pattern' => '/^[A-z\-\_]+$/'),
            array('alias','unique',
                'caseSensitive'=>true,
                'allowEmpty'=>false,
            ),
            array('txt', 'safe'),
            //array('parent','length', 'max'=>1),
			array('lft, rgt, level, order, show', 'numerical', 'integerOnly'=>true),
			array('name, alias, title', 'length', 'max'=>150),
			array('meta_k', 'length', 'max'=>255),
			array('cssclass, htmlview', 'length', 'max'=>100),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lft, rgt, level, name, alias, title, meta_k, meta_d, img, order, show, txt, cssclass, htmlview', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
			'name' => 'Name',
			'alias' => 'Alias',
			'title' => 'Title',
			'meta_k' => 'Meta K',
			'meta_d' => 'Meta D',
			'img' => 'Img',
			'order' => 'Order',
			'show' => 'Show',
			'txt' => 'Txt',
			'cssclass' => 'Cssclass',
			'htmlview' => 'Htmlview',
            'parent' => 'parent'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('level',$this->level);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('meta_k',$this->meta_k,true);
		$criteria->compare('meta_d',$this->meta_d,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('show',$this->show);
		$criteria->compare('txt',$this->txt,true);
		$criteria->compare('cssclass',$this->cssclass,true);
		$criteria->compare('htmlview',$this->htmlview,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Создает корневую категорию либо возвращает уже имеющуюся
     * @param Category $model
     * @return mixed
     */
    public static function getRoot(Category $model){
        $root = $model->roots()->find();
        if (! $root){
            $model->name = 'Категории';
            $model->alias = 'Root';
            $model->title = 'Категории';
            $model->meta_k = 'Категории';
            $model->meta_d = 'Категории';
            $model->txt = 'Категории';
            $model->saveNode();
            $root = $model->roots()->find();
        }
        return $root;
    }




}
