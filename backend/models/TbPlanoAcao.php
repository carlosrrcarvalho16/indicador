<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_plano_acao".
 *
 * @property integer $idPlano
 * @property integer $indicador
 * @property string $ano
 * @property integer $mes
 * @property string $item
 * @property string $descricao_problema
 * @property string $plano_acao
 * @property string $responsavel
 * @property string $abertura
 * @property string $prazo
 * @property string $status
 *
 * @property TbIndicador $indicador0
 */
class TbPlanoAcao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_plano_acao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['indicador', 'status'], 'required'],
            [['indicador', 'mes'], 'integer'],
            [['abertura', 'prazo'], 'safe'],
            [['ano'], 'string', 'max' => 4],
            [['item', 'responsavel'], 'string', 'max' => 50],
            [['descricao_problema', 'plano_acao'], 'string', 'max' => 250],
            [['status'], 'string', 'max' => 10],
            [['indicador'], 'exist', 'skipOnError' => true, 'targetClass' => TbIndicador::className(), 'targetAttribute' => ['indicador' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPlano'            => 'Id Plano',
            'indicador'          => 'Indicador',
            'ano'                => 'Ano',
            'mes'                => 'Mes',
            'item'               => 'Item',
            'descricao_problema' => 'Descricao Problema',
            'plano_acao'         => 'Plano Acao',
            'responsavel'        => 'Responsavel',
            'abertura'           => 'Abertura',
            'prazo'              => 'Prazo',
            'status'             => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicador()
    {
        return $this->hasOne(TbIndicador::className(), ['id' => 'indicador']);
    }
}