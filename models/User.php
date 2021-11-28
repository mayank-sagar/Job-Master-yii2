<?php

namespace app\models;
use yii;
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    // public $id;
    // public $name;
    // public $username;
    // public $password;
    // public $authKey;
    // public $accessToken;
    public $confirm_password;


    public static function tableName()
    {
        return 'tbl_users';
    }

    public function rules()
    {
        return [
            [['name', 'username', 'password', 'confirm_password', 'email'], 'required'],
            [['name', 'username','email'], 'string', 'max' => 40],
            [['email'],'email'],
            [['email','username'],'unique'],
            [['password', 'confirm_password'], 'string', 'max' => 40, 'min' => 8],
            [['confirm_password'],'compare', 'compareAttribute'=>'password', 'message'=>"Confirm password must match with password field." ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'confirm_password' => 'Confirm Pasword',
            'email' => 'Email'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne(['id'=>$id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      return self::findOne(['auth_key'=> $token]);
    }

   /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */

    public static function findByUsername($email) {
        return User::findOne([
            'email' => $email
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */

    public function validatePassword($password)
    {
        return yii::$app->getSecurity()-> validatePassword($password,$this->password );
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if($this->isNewRecord) {
            $this->auth_key = yii::$app->security->generateRandomString(12);    
        }
        if($this->password) {
            $this->password = yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        return true;
    }

    public function getJobs() {
        return $this->hasMany(Job::class,[
            'user_id' => 'id'
        ]);
    }
}
