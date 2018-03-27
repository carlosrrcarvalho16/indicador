<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_departaments".
 *
 * @property integer $id
 * @property string $departamento
 * @property integer $managerUserId
 *
 * @property User $managerUser
 * @property TbIndicador[] $tbIndicadors
 */
class TbDepartaments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_departaments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['managerUserId'], 'required'],
            [['managerUserId'], 'integer'],
            [['departamento'], 'string', 'max' => 100],
            [['managerUserId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['managerUserId' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'departamento'  => 'Departamento',
            'managerUserId' => 'Manager User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManageruser()
    {
        return $this->hasOne(User::className(), ['ID' => 'managerUserId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadores()
    {
        return $this->hasMany(TbIndicador::className(), ['departamentoID' => 'id']);
    }
}