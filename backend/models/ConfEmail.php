<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conf_email".
 *
 * @property string $ID
 * @property string $id_company
 * @property string $id_user
 * @property string $from_name
 * @property string $host_smtp
 * @property string $port
 * @property string $security
 * @property string $from_email
 * @property string $password
 * @property string $active
 *
 * @property Company $idCompany
 */
class ConfEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conf_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_company', 'host_smtp'], 'required', 'message' => 'Campo "{attribute}" obrigatório'],
            [['id_company', 'id_user', 'port'], 'integer'],
            [['from_name', 'from_email'], 'string', 'max' => 100],
            [['security'], 'string', 'max' => 10],
            [['host_smtp', 'password'], 'string', 'max' => 255],
            [['active'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'         => Yii::t('app', 'ID'),
            'id_company' => Yii::t('app', 'Empresa'),
            'id_user'    => Yii::t('app', 'Úsuário'),
            'from_name'  => Yii::t('app', 'Nome Remetente'),
            'host_smtp'  => Yii::t('app', 'Host SMTP'),
            'port'       => Yii::t('app', 'Porta'),
            'security'   => Yii::t('app', 'Segurança'),
            'from_email' => Yii::t('app', 'E-mail de envio'),
            'password'   => Yii::t('app', 'Senha'),
            'active'     => Yii::t('app', 'Ativo'),
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['ID' => 'id_user']);
    }

    public static function checkConfCompany($id_user=0){
        
        if($id_user <> 0){
            $user = User::find()->where(['ID' => $id_user, 'active' => 'Y'])->one();
        }else{
            $user = Yii::$app->user->identity;
        }
        
        $ConfEmail = ConfEmail::find()->where(['id_company' => $user->id_company, 'id_user' => $user->ID, 'active' => 'Y'])->one();
        if(!$ConfEmail)
            $ConfEmail = ConfEmail::find()->where(['id_company' => $user->id_company, 'active' => 'Y'])->one();
        
        return $ConfEmail;
    }
}
