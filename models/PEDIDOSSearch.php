<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PEDIDOS;

/**
 * PEDIDOSSearch represents the model behind the search form of `app\models\PEDIDOS`.
 */
class PEDIDOSSearch extends PEDIDOS
{
    
    public $estado;
    public $usuario_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Idpedidos', 'MESA_numero_de_mesa', 'PERSONA_cedula'], 'integer'],
            [['hora_comanda', 'fecha_comanda', 'estado_comanda','USUARIO_usuarioId'], 'safe'],
            [['estado','usuario_id'], 'string'],
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
        if(isset($this->estado))
            $query = PEDIDOS::find()->where(['estado_comanda' => $this->estado]);

        else if(isset($this->usuario_id))
            $query = PEDIDOS::find()->where(['USUARIO_usuarioId' => $this->usuario_id])->orderBy(['Idpedidos' => SORT_DESC]);

        else
            $query = PEDIDOS::find();

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
            'Idpedidos' => $this->Idpedidos,
            'MESA_numero_de_mesa' => $this->MESA_numero_de_mesa,
            'PERSONA_cedula' => $this->PERSONA_cedula,
            'hora_comanda' => $this->hora_comanda,
            'fecha_comanda' => $this->fecha_comanda,
        ]);

        $query->andFilterWhere(['like', 'estado_comanda', $this->estado_comanda]);

        return $dataProvider;
    }
}
