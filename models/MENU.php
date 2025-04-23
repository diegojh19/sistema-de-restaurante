<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MENU".
 *
 * @property int $idMENU
 * @property int $valor_menu
 * @property string $estado_menu
 * @property string $descripcion

 *
 * @property DETALLEDECOMANDAS[] $dETALLEDECOMANDASs
 * @property PEDIDOS[] $pEDIDOSIdpedidos
 */
class MENU extends \yii\db\ActiveRecord
{
    const DISPONIBLE = 'Disponible';
    const AGOTADO = 'Agotado';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MENU';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMENU'], 'required'],
            [['idMENU', 'valor_menu','cantidad_disponible'], 'integer'],
            [['estado_menu'], 'string', 'max' => 20],
            [['nombre','descripcion'], 'string', 'max' => 255],
            [['idMENU'], 'unique'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMENU' => 'Número de Menú',
            'valor_menu' => 'Valor Menú',
            'nombre'=> 'Nombre Menú',
            'estado_menu' => 'Estado Menú',
            'descricion'=>'descricion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDETALLEDECOMANDASs()
    {
        return $this->hasMany(DETALLEDECOMANDAS::className(), ['MENU_idMENU' => 'idMENU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEDIDOSIdpedidos()
    {
        return $this->hasMany(PEDIDOS::className(), ['Idpedidos' => 'PEDIDOS_Idpedidos'])->viaTable('DETALLE_DE_COMANDAS', ['MENU_idMENU' => 'idMENU']);
    }


    public function setMenuTotalName(){
        $this->nombre;
    }
}
