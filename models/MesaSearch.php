<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\mesa;

/**
 * MesaSearch represents the model behind the search form of `app\models\mesa`.
 */
class MesaSearch extends mesa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero_de_mesa', 'numero_de_puestos', 'estado_de_mesa'], 'integer'],
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
        $query = mesa::find();

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
            'numero_de_mesa' => $this->numero_de_mesa,
            'numero_de_puestos' => $this->numero_de_puestos,
            'estado_de_mesa' => $this->estado_de_mesa,
        ]);

        return $dataProvider;
    }
}
