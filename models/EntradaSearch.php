<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ENTRADA;

/**
 * EntradaSearch represents the model behind the search form of `app\models\ENTRADA`.
 */
class EntradaSearch extends ENTRADA
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsopa'], 'integer'],
            [['nombre_entrada'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ENTRADA::find();

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
            'idsopa' => $this->idsopa,
        ]);

        $query->andFilterWhere(['like', 'nombre_entrada', $this->nombre_entrada]);

        return $dataProvider;
    }
}
