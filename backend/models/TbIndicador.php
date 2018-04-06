<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_indicador".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property string $ano
 * @property double $meta
 * @property integer $sentido_da_meta
 * @property double $ytd
 * @property integer $departamentoID
 * @property integer $criadoPor
 * @property string $dataCriacao
 * @property integer $modificadoPor
 * @property string $dataModificacao
 *
 * @property TbDadosmes[] $tbDadosmes
 * @property TbDepartaments $departamento
 * @property User $criadoPor0
 * @property User $modificadoPor0
 * @property TbPlanoAcao[] $tbPlanoAcaos
 */
class TbIndicador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_indicador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meta', 'ytd'], 'number'],
            [['sentido_da_meta', 'departamentoID', 'criadoPor', 'modificadoPor'], 'integer'],
            [['dataCriacao', 'dataModificacao'], 'safe'],
            [['nome'], 'string', 'max' => 100],
            [['descricao'], 'string', 'max' => 50],
            [['ano'], 'string', 'max' => 4],
            [['departamentoID'], 'exist', 'skipOnError' => true, 'targetClass' => TbDepartaments::className(), 'targetAttribute' => ['departamentoID' => 'id']],
            [['criadoPor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['criadoPor' => 'ID']],
            [['modificadoPor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modificadoPor' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => 'ID',
            'nome'            => 'Nome',
            'descricao'       => 'Descricao',
            'ano'             => 'Ano',
            'meta'            => 'Meta',
            'sentido_da_meta' => 'Sentido Da Meta',
            'ytd'             => 'Ytd',
            'departamentoID'  => 'Departamento ID',
            'criadoPor'       => 'Criado Por',
            'dataCriacao'     => 'Data Criacao',
            'modificadoPor'   => 'Modificado Por',
            'dataModificacao' => 'Data Modificacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbDadosmes()
    {
        return $this->hasMany(TbDadosmes::className(), ['idIndicador' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(TbDepartaments::className(), ['id' => 'departamentoID']);
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
    public function getModificadopor()
    {
        return $this->hasOne(User::className(), ['ID' => 'modificadoPor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoacoes()
    {
        return $this->hasMany(TbPlanoAcao::className(), ['indicador' => 'id']);
    }

    public function beforeValidate() 
    {
        if($this->isNewRecord){
            $this->setAttribute('criadoPor', Yii::$app->user->identity->ID);
        }else{
            $this->setAttribute('modificadoPor', Yii::$app->user->identity->ID);
            // $this->setAttribute('dataModificacao', new \yii\db\Expression('NOW()') );
        }
        return parent::beforeValidate();
    }
}
