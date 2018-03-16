<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property string $ID
 * @property string $name
 * @property string $active
 *
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Campo "{attribute}" obrigatório'],
            [['name'], 'string', 'max' => 155],
            [['active'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID'     => 'ID',
            'name'   => 'Nome',
            'active' => 'Ativo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(User::className(), ['id_company' => 'ID']);
    }

    /** 
     * @return \yii\db\ActiveQuery 
    */ 
    public function getConfEmail() 
    {
        return $this->hasOne(ConfEmail::className(), ['id_company' => 'ID']);
    }

    public static function findCompanyUser(){
        
        $user  = Yii::$app->user->identity;
        $query = Company::find();
        if($user->ID != 1)
            $query = $query->orFilterWhere(['ID' => $user->id_company]);
        $result = $query->all();

        return $result;
    }
}
