<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "username".
 *
 * @property string $ID
 * @property string $id_company
 * @property string $group
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $image
 * @property string $ativo
 *
 */
class User extends \yii\db\ActiveRecord
{
    public $password;

    public $currentPassword;
    public $newPassword;
    public $newPasswordConfirm;
    const STATUS_DELETED = 2;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_company'], 'integer'],
            [['email', 'username', 'auth_key', 'password_hash'], 'required', 'message' => 'Campo "{attribute}" obrigatório'],
            [['name', 'email'], 'string', 'max' => 155],
            [['username'], 'string', 'max' => 50],
            [['group'], 'string', 'max' => 64],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 100],
            [['active'], 'string', 'max' => 1],
            [['username'], 'unique'],
            [['email'], 'unique'], //daqui  para baixo adicionado
/* aqui */  [['newPassword','currentPassword','newPasswordConfirm'],'required'],
/* aqui */  [['currentPassword'],'validateCurrentPassword'],
/* aqui */  [['newPassword','newPasswordConfirm'],'string','min'=> 3],
/* aqui */  [['newPassword','newPasswordConfirm'],'filter','filter'=>'trim'],
/* aqui */  [['newPasswordConfirm'],'compare','compareAttribute'=>'newPassword','message'=>'Password do not match'],
        ];
    }
    public function validateCurrentPassword(){
        if(!$this->verfyPassowrd($this->currentPassword)){
            $this->addError("currentPassword",'Current Password incorret');
        }
    }
    public function verfyPassowrd($password){
        $dbpassword = static::findOne(['username'=>Yii::$app->user->identity->username, 'status' => self::STATUS_ACTIVE])->password_hash;
        return Yii::$app->security->validatePassword($password,$dbpassword);
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user             = new Usuario();
            $user->name     = $this->name;
            $user->username = $this->username;
            $user->email    = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();

            return $user;
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'                   => 'ID',
            'id_company'           => 'Empresa',
            'group'                => 'Grupo',
            'name'                 => 'Nome',
            'email'                => 'E-mail',
            'username'             => 'Usuário',
            'password'             => 'Senha',
            'auth_key'             => 'Chave Autenticação',
            'password_hash'        => 'Hash Senha',
            'password_reset_token' => 'Senha Token Reset',
            'image'                => 'Imagem',
            'active'               => 'Ativo',
        ];
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['ID' => 'id_company']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthgroup()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'group']);
    }

    /** 
     * @return \yii\db\ActiveQuery 
    */ 
    public function getConfEmail() 
    {
        return $this->hasOne(ConfEmail::className(), ['id_user' => 'ID']);
    }

    public static function findCompany(){
        $user = Yii::$app->user->identity;
        $findCompany = Company::find()->where(['ID' => $user->id_company])->one();
        return $findCompany;
    }

    public static function findUsersCompany(){
        
        $user = Yii::$app->user->identity;
        $findCompany = Usuario::find()->joinWith('company')
        ->orFilterWhere(['id_company' => $user->id_company])
        ->orderBy('username.name ASC')
        ->all();

        return $findCompany;
    }
}
