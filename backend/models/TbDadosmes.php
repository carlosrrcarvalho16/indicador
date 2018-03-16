<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_dadosmes".
 *
 * @property integer $id
 * @property double $valor
 * @property integer $idIndicador
 * @property string $data
 * @property integer $mes
 * @property double $meta
 * @property integer $sentido
 * @property integer $ano
 * @property integer $criadoPor
 * @property string $dataCriacao
 * @property integer $modificadoPor
 * @property string $dataModificacao
 *
 * @property User $modificadoPor0
 * @property User $criadoPor0
 * @property TbIndicador $idIndicador0
 */
class TbDadosmes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_dadosmes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor', 'meta'], 'number'],
            [['idIndicador', 'mes', 'sentido', 'ano', 'criadoPor', 'modificadoPor'], 'integer'],
            [['data', 'dataCriacao', 'dataModificacao'], 'safe'],
            [['sentido', 'ano'], 'required'],
            [['modificadoPor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modificadoPor' => 'ID']],
            [['criadoPor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['criadoPor' => 'ID']],
            [['idIndicador'], 'exist', 'skipOnError' => true, 'targetClass' => TbIndicador::className(), 'targetAttribute' => ['idIndicador' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => 'ID',
            'valor'           => 'Valor',
            'idIndicador'     => 'Id Indicador',
            'data'            => 'Data',
            'mes'             => 'Mes',
            'meta'            => 'Meta',
            'sentido'         => 'Sentido',
            'ano'             => 'Ano',
            'criadoPor'       => 'Criado Por',
            'dataCriacao'     => 'Data Criacao',
            'modificadoPor'   => 'Modificado Por',
            'dataModificacao' => 'Data Modificacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModificadopor()
    {
        return $this->hasOne(User::className(), ['ID' => 'modificadoPor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriadopor()
    {
        return $this->hasOne(User::className(), ['ID' => 'criadoPor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicador()
    {
        return $this->hasOne(TbIndicador::className(), ['id' => 'idIndicador']);
    }
}
