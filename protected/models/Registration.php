<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Registration extends CActiveRecord{

    public $username;
    public $email;
    public $password;
    public $password2;
    public $verifyCode;

    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    public function tableName() {
        return '{{user}}';
    }

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('email, username', 'unique'),
            array('username', 'match', 'pattern'=>'/^[A-z][\w]+$/'),
            array('email', 'email'),
            array('username, password, email, password2', 'required'),
            array('password', 'compare', 'compareAttribute'=>'password2'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),),
        );
    }

    /**
     * Declares attribute labels.
     */
    // Метки атрибутов
    public function attributeLabels(){
        return array(
            'username' => 'Логин',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'password2' => 'Повторите пароль',
            'verifyCode'=>'Капча',
        );
    }

}
