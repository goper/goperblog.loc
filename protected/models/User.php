<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $date
 * @property string $email
 * @property boolean $ban
 * @property integer $role
 */
class User extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, username', 'unique'),
            array('email', 'email'),
            array('username, password, email', 'required'),
            array('date, role', 'numerical', 'integerOnly' => true),
            array('username, email', 'length', 'max' => 128),
            array('password', 'length', 'max' => 64),
            array('ban', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, password, date, email, ban, role', 'safe', 'on' => 'search'),
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
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Login',
            'password' => 'Пароль',
            'date' => 'Создан',
            'email' => 'Email',
            'ban' => 'Забанен',
            'role' => 'Role',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('date', $this->date);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('ban', $this->ban);
        $criteria->compare('role', $this->role);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $this->date = time();
        if ($this->isNewRecord) {
            //$this->password = md5($this->password);
            $this->password = crypt($this->password);
        }
        return parent::beforeSave();
    }

    public function validatePassword($password) {
        return crypt($password, $this->password) === $this->password;                
        //return $this->hashPassword($password) === $this->password;
    }

    public function hashPassword($password) {
        return md5($password);
    }

}
