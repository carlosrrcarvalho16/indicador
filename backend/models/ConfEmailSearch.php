<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ConfEmail;

/**
 * ConfEmailSearch represents the model behind the search form of `backend\models\ConfEmail`.
 */
class ConfEmailSearch extends ConfEmail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'id_company', 'port'], 'integer'],
            [['from_name', 'host_smtp', 'from_email', 'password', 'active'], 'safe'],
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
        $query = ConfEmail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'id_company' => $this->id_company,
            'port' => $this->port,
        ]);

        $query->andFilterWhere(['like', 'from_name', $this->from_name])
            ->andFilterWhere(['like', 'host_smtp', $this->host_smtp])
            ->andFilterWhere(['like', 'from_email', $this->from_email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
