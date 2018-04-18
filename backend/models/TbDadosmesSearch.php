<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TbDadosmes;

/**
 * TbDadosmesSearch represents the model behind the search form of `backend\models\TbDadosmes`.
 */
class TbDadosmesSearch extends TbDadosmes
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idIndicador', 'mes', 'sentido', 'criadoPor', 'modificadoPor'], 'integer'],
            [['valor', 'ytd', 'meta'], 'number'],
            [['data', 'ano', 'dataCriacao', 'dataModificacao', ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //var_dump($params) ; die;
        //$query = TbDadosmes::find()->where(['idIndicador' => $xxxx]);
        $query = TbDadosmes::find();
        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['idIndicador' => SORT_ASC, 'ano' => SORT_DESC ,'mes' => SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if (isset($_GET['ind'])) {
            $ind = $_GET['ind'];
        } else{
            $ind ="1";
        }
       

        $ano = Yii::$app->session->get('ANO_DASH');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           // 'valor' => $this->valor,
           //'idIndicador' => $this->idIndicador,
            'idIndicador' => $ind ,
           // 'ytd' => $this->ytd,
           // 'data' => $this->data,
            //'ano' => $this->ano,
            'ano' =>$ano,
          //  'mes' => $this->mes,
           // 'meta' => $this->meta,
           // 'sentido' => $this->sentido,
           // 'criadoPor' => $this->criadoPor,
           // 'dataCriacao' => $this->dataCriacao,
           // 'modificadoPor' => $this->modificadoPor,
           // 'dataModificacao' => $this->dataModificacao,





        ]);

       // $query->andFilterWhere(['like', 'ano', $this->ano]);


        return $dataProvider;
    }
}
