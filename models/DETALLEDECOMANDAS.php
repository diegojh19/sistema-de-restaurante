<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DETALLE_DE_COMANDAS".
 *
 * @property int $MENU_idMENU
 * @property int $PEDIDOS_Idpedidos
 *
 * @property PEDIDOS $pEDIDOSIdpedidos
 * @property MENU $mENUIdMENU
 */
class DETALLEDECOMANDAS extends \yii\db\ActiveRecord
{
    const DESPACHADO_SI = 'SI';
    const DESPACHADO_NO = 'NO';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DETALLE_DE_COMANDAS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MENU_idMENU', 'PEDIDOS_Idpedidos'], 'required'],
            [['MENU_idMENU', 'PEDIDOS_Idpedidos','valor_unitario','cantidad'], 'integer'],
            [['descripcion','despachado'], 'string'],
            [['MENU_idMENU', 'PEDIDOS_Idpedidos'], 'unique', 'targetAttribute' => ['MENU_idMENU', 'PEDIDOS_Idpedidos']],
            [['PEDIDOS_Idpedidos'], 'exist', 'skipOnError' => true, 'targetClass' => PEDIDOS::className(), 'targetAttribute' => ['PEDIDOS_Idpedidos' => 'Idpedidos']],
            [['MENU_idMENU'], 'exist', 'skipOnError' => true, 'targetClass' => MENU::className(), 'targetAttribute' => ['MENU_idMENU' => 'idMENU']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MENU_idMENU' => 'Menu Id Menu',
            'PEDIDOS_Idpedidos' => 'Pedidos Idpedidos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEDIDOSIdpedidos()
    {
        return $this->hasOne(PEDIDOS::className(), ['Idpedidos' => 'PEDIDOS_Idpedidos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUIdMENU()
    {
        return $this->hasOne(MENU::className(), ['idMENU' => 'MENU_idMENU']);
    }

    public function getValorTotal(){
        return $this->valor_unitario * $this->cantidad;
    }
}
