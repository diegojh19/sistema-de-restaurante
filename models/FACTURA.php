<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "FACTURA".
 *
 * @property int $idFACTURA
 * @property int $MESA_numero_de_mesa
 * @property int $PEDIDOS_Idpedidos
 * @property int $valor_unitario
 * @property int $valor_total
 * @property string $fecha_factura
 * @property string $estado_factura
 *
 * @property PEDIDOS $pEDIDOSIdpedidos
 * @property MESA $mESANumeroDeMesa
 */
class FACTURA extends \yii\db\ActiveRecord
{
    const ESTADO_FACTURADA = "FACTURADA";

    public $nombre_restaurante = "Restaurante Popeye`s"; 
    public $nit_restaurante = "000000-0"; 
    public $direccion_restaurante = "CALLE 19 # 8-63"; 
    public $telefono_restaurante = "3203972414"; 

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'FACTURA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idFACTURA', 'MESA_numero_de_mesa', 'PEDIDOS_Idpedidos'], 'required'],
            [['idFACTURA', 'MESA_numero_de_mesa', 'PEDIDOS_Idpedidos', 'valor_unitario', 'valor_total'], 'integer'],
            [['fecha_factura'], 'safe'],
            [['estado_factura'], 'string', 'max' => 20],
            [['idFACTURA', 'MESA_numero_de_mesa'], 'unique', 'targetAttribute' => ['idFACTURA', 'MESA_numero_de_mesa']],
            [['PEDIDOS_Idpedidos'], 'exist', 'skipOnError' => true, 'targetClass' => PEDIDOS::className(), 'targetAttribute' => ['PEDIDOS_Idpedidos' => 'Idpedidos']],
            [['MESA_numero_de_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => MESA::className(), 'targetAttribute' => ['MESA_numero_de_mesa' => 'numero_de_mesa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFACTURA' => 'Número de Factura',
            'MESA_numero_de_mesa' => 'Número De Mesa',
            'PEDIDOS_Idpedidos' => 'Comanda',
            'valor_unitario' => 'Valor Unitario',
            'valor_total' => 'Valor Total',
            'fecha_factura' => 'Fecha Factura',
            'estado_factura' => 'Estado Factura',
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
    public function getMESANumeroDeMesa()
    {
        return $this->hasOne(MESA::className(), ['numero_de_mesa' => 'MESA_numero_de_mesa']);
    }
}
