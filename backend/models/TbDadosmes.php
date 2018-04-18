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
 * @property double $ynd
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
            [['valor', 'meta','ytd'], 'number'],
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
            'ytd'             =>  'YTD',
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

    public static function getDadosMes($departament, $year, $month){
        $sql = "CALL `selectTb_dadosmesAnoMes`('{$departament}', '{$year}', '{$month}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    public static function getDadosMesAno($departament, $year){
        $sql = "CALL `selectTb_dadosmesAno`('{$departament}', '{$year}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    public static function getDadosYTD($departamentName, $year){
        $departamentName = trim($departamentName);
        $sql = "CALL `select_YTD`('{$departamentName}', '{$year}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    //Retorna os meses do ano encontrado na tabela tb_dadosmes
    public static function getAnos(){
        $departamentName = trim($departamentName);
        $sql = "CALL `selectAnos`()";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    //Retorna a lista dos departamentos que o usuário logado tem permissão de acessar
    public static function getDepartamentoAuth($vGrupo){
        $sql = "CALL `selectDepartamentoAuth`('{$vGrupo}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    //Carrega os indicadores conforme o departamento selecionado
    public static function getIndicadorAuth($idDep, $year){
        
       $sql = "CALL `selectIndicadorAno`('{$idDep}', '{$year}')";
       $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }

    //Seta valores antes da validação
    public function beforeValidate() 
    {
       // echo 'aqui';die;

        $datetime  = date('Y-m-d');
        if($this->isNewRecord){
            $this->setAttribute('criadoPor', Yii::$app->user->identity->ID);
            $this->setAttribute('dataCriacao', $datetime );
        }else{
            $this->setAttribute('modificadoPor', Yii::$app->user->identity->ID);
            $this->setAttribute('dataModificacao', $datetime );
        }
        return parent::beforeValidate();
    }
    

}
