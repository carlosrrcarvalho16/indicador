<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\User;

/**
 * UserSearch represents the model behind the search form about `backend\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'id_company'], 'integer'],
            [['name', 'email', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'image', 'active'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(Yii::$app->user->identity->id_company != 0){
            $query->andFilterWhere([
                'id_company'=> Yii::$app->user->identity->id_company
            ]);
        }

        /*$query->andFilterWhere([
            'ID' => $this->ID,
            'id_company' => $this->id_company,
            'data_cadastro' => $this->data_cadastro,
            'id_username_cadastro' => $this->id_username_cadastro,
            'data_atualizacao' => $this->data_atualizacao,
            'id_username_atualizacao' => $this->id_username_atualizacao,
            'data_desativacao' => $this->data_desativacao,
            'id_username_desativacao' => $this->id_username_desativacao,
        ]);*/

       /* $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'ativo', $this->ativo]);*/

        return $dataProvider;
    }
}
