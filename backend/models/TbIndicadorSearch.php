<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TbIndicador;

/**
 * TbIndicadorSearch represents the model behind the search form of `backend\models\TbIndicador`.
 */
class TbIndicadorSearch extends TbIndicador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sentido_da_meta', 'departamentoID', 'criadoPor', 'modificadoPor'], 'integer'],
            [['nome', 'descricao', 'ano', 'dataCriacao', 'dataModificacao', 'active'], 'safe'],
            [['meta', 'ytd'], 'number'],
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
        $query = TbIndicador::find();

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
            'meta' => $this->meta,
            'sentido_da_meta' => $this->sentido_da_meta,
            'ytd' => $this->ytd,
            'departamentoID' => $this->departamentoID,
            'criadoPor' => $this->criadoPor,
            'dataCriacao' => $this->dataCriacao,
            'modificadoPor' => $this->modificadoPor,
            'dataModificacao' => $this->dataModificacao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'ano', $this->ano])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
