<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TbPlanoAcao;

/**
 * TbPlanoAcaoSearch represents the model behind the search form of `backend\models\TbPlanoAcao`.
 */
class TbPlanoAcaoSearch extends TbPlanoAcao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPlano', 'indicador', 'mes'], 'integer'],
            [['ano', 'item', 'descricao_problema', 'plano_acao', 'responsavel', 'abertura', 'prazo', 'status',], 'safe'],
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
        $query = TbPlanoAcao::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idPlano'   => $this->idPlano,
            'indicador' => $this->indicador,
            'mes'       => $this->mes,
            'abertura'  => $this->abertura,
            'prazo'     => $this->prazo,
        ]);

        $query->andFilterWhere(['like', 'ano', $this->ano])
            ->andFilterWhere(['like', 'item', $this->item])
            ->andFilterWhere(['like', 'descricao_problema', $this->descricao_problema])
            ->andFilterWhere(['like', 'plano_acao', $this->plano_acao])
            ->andFilterWhere(['like', 'responsavel', $this->responsavel])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
