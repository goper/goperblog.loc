<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $content
 */
class Page extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{page}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, name, content, alias, date, show', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, name, content, alias, date, show', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        $criteria->compare('title',$this->title,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('alias',$this->alias,true);
        $criteria->compare('show',$this->show,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Название',
            'content' => 'Контент',
            'alias' => 'Алиас',
            'date' => 'Создан',
            'show' => 'Опубликован?',
        );
    }

    

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        //if($this->isNewRecord){
            $this->date = time();
        //}
        return parent::beforeSave();
    }

}
