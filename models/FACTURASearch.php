<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FACTURA;

/**
 * FACTURASearch represents the model behind the search form of `app\models\FACTURA`.
 */
class FACTURASearch extends FACTURA
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idFACTURA', 'MESA_numero_de_mesa', 'PEDIDOS_Idpedidos', 'valor_unitario', 'valor_total'], 'integer'],
            [['fecha_factura', 'estado_factura'], 'safe'],
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
        $query = FACTURA::find();

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
            'idFACTURA' => $this->idFACTURA,
            'MESA_numero_de_mesa' => $this->MESA_numero_de_mesa,
            'PEDIDOS_Idpedidos' => $this->PEDIDOS_Idpedidos,
            'valor_unitario' => $this->valor_unitario,
            'valor_total' => $this->valor_total,
            'fecha_factura' => $this->fecha_factura,
        ]);

        $query->andFilterWhere(['like', 'estado_factura', $this->estado_factura]);

        return $dataProvider;
    }
}
