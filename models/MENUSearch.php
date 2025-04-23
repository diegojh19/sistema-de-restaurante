<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MENU;

/**
 * MENUSearch represents the model behind the search form of `app\models\MENU`.
 */
class MENUSearch extends MENU
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMENU','valor_menu','nombre','cantidad_disponible'], 'integer'],
            [['estado_menu','descripcion'], 'safe'],
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
        $query = MENU::find();

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
            'idMENU' => $this->idMENU,
            'valor_menu' => $this->valor_menu,
        ]);

        $query->andFilterWhere(['like', 'estado_menu', $this->estado_menu]);

        return $dataProvider;
    }
}
