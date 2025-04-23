<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DETALLEDECOMANDAS;

/**
 * DETALLEDECOMANDASSearch represents the model behind the search form of `app\models\DETALLEDECOMANDAS`.
 */
class DETALLEDECOMANDASSearch extends DETALLEDECOMANDAS
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MENU_idMENU', 'PEDIDOS_Idpedidos','valor_unitario','cantidad'], 'integer'],
            [['descripcion'], 'string'],
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
        $query = DETALLEDECOMANDAS::find();

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
            'MENU_idMENU' => $this->MENU_idMENU,
            'PEDIDOS_Idpedidos' => $this->PEDIDOS_Idpedidos,
            'valor_unitario' => $this->valor_unitario,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
