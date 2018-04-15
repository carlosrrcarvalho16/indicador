<?php

namespace backend\models;

use Yii;
use backend\models\user;

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
            'departamento'  => 'Nome',
            'managerUserId' => 'Gerente',
            'active'        => 'Ativo',
            'icons'         => 'Ícone'
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

    public static function getSelectDepartamento($month, $year){
        $sql = "CALL `selectDepartamento`('{$month}','{$year}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    
    //Retorna um array com os Departamento e a quantidade de Planos atrazados por indicador
    public static function getSelectDepartamentoComPlanosAtrazados($year){
        $sql = "CALL `selectDepartamentoComPlanosAtrazados`('{$year}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    //Retorna o total de planos de ações abertos
    public static function getFn_PlanosAcaoAbertos($year){
        $sql = "SELECT `fn_PlanosAcaoAbertos`('{$year}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    //Retorna o total de planos de ações atrazados
    public static function getFn_PlanosAcaoAtrazados($year){
        $sql = "SELECT `fn_PlanosAcaoAtrazados`('{$year}')";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }


}
