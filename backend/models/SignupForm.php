<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
	public $ID;
    public $name;
    public $group;
    public $id_company;
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['id_company', 'required'],

            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => 'Tem que preencher este campo!'],
            ['name', 'required', 'message' => 'Tem que preencher este campo!'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Usuário já existente.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['group', 'string', 'max' => 64],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'Tem que preencher este campo!'],
            ['name', 'required', 'message' => 'Tem que preencher este campo!'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email já existente.'],

            ['password', 'required', 'message' => 'Tem que preencher este campo!'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user             = new User();
            $user->id_company =  $this->id_company;
            $user->name       = $this->name;
            $user->group      = $this->group;
            $user->username   = $this->username;
            $user->email      = $this->email;
			$user->setPassword($this->password);
			$user->generateAuthKey();
			$user->save();

            return $user;
        }elseif($this->getErrors()){
            return $this;
        }

        return null;
    }

     /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_company' => 'Empresa',
            'name'       => 'Nome',
            'group'      => 'Grupo',
            'username'   => 'Usuário',
            'password'   => 'Senha'
        ];
    }
}
