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
            [['data', 'ano', 'dataCriacao', 'dataModificacao'], 'safe'],
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
        $query = TbDadosmes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'valor' => $this->valor,
            'idIndicador' => $this->idIndicador,
            'ytd' => $this->ytd,
            'data' => $this->data,
            'mes' => $this->mes,
            'meta' => $this->meta,
            'sentido' => $this->sentido,
            'criadoPor' => $this->criadoPor,
            'dataCriacao' => $this->dataCriacao,
            'modificadoPor' => $this->modificadoPor,
            'dataModificacao' => $this->dataModificacao,
        ]);

        $query->andFilterWhere(['like', 'ano', $this->ano]);

        return $dataProvider;
    }
}
