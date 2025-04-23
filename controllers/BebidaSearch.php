<?php

namespace app\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BEBIDA;

/**
 * BebidaSearch represents the model behind the search form of `app\models\BEBIDA`.
 */
class BebidaSearch extends BEBIDA
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBEBIDA'], 'integer'],
            [['nombre_bebida'], 'safe'],
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
        $query = BEBIDA::find();

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
            'idBEBIDA' => $this->idBEBIDA,
        ]);

        $query->andFilterWhere(['like', 'nombre_bebida', $this->nombre_bebida]);

        return $dataProvider;
    }
}
