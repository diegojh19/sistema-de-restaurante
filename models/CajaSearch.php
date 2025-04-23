<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caja;

/**
 * CajaSearch represents the model behind the search form of `app\models\Caja`.
 */
class CajaSearch extends Caja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCaja', 'monto_inicial', 'monto_final'], 'integer'],
            [['fecha_caja', 'observacion'], 'safe'],
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
        $query = Caja::find();

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
            'idCaja' => $this->idCaja,
            'fecha_caja' => $this->fecha_caja,
            'monto_inicial' => $this->monto_inicial,
            'monto_final' => $this->monto_final,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
