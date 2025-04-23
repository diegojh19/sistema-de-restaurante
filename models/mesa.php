<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MESA".
 *
 * @property int $numero_de_mesa
 * @property string $ubicacion
 * @property int $numero_de_puestos
 * @property string $estado_de_mesa
 *
 * @property FACTURA[] $fACTURAs
 * @property PEDIDOS[] $pEDIDOSs
 * @property RESERVAHasMESA[] $rESERVAHasMESAs
 * @property RESERVA[] $rESERVAIdRESERVAs
 */
class MESA extends \yii\db\ActiveRecord
{
    const MESA_DISPONIBLE = 'DISPONIBLE';
    const MESA_OCUPADA = 'OCUPADA';
    const MESA_RESERVADA = 'RESERVADA';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MESA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero_de_mesa'], 'required'],
            [['numero_de_mesa', 'numero_de_puestos'], 'integer'],
            [['ubicacion', 'estado_de_mesa'], 'string', 'max' => 20],
            [['numero_de_mesa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'numero_de_mesa' => 'Numero De Mesa',
            'ubicacion' => 'Ubicacion',
            'numero_de_puestos' => 'Numero De Sillas',
            'estado_de_mesa' => 'Estado De Mesa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFACTURAs()
    {
        return $this->hasMany(FACTURA::className(), ['MESA_numero_de_mesa' => 'numero_de_mesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEDIDOSs()
    {
        return $this->hasMany(PEDIDOS::className(), ['MESA_numero_de_mesa' => 'numero_de_mesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRESERVAHasMESAs()
    {
        return $this->hasMany(RESERVAHasMESA::className(), ['MESA_numero_de_mesa' => 'numero_de_mesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRESERVAIdRESERVAs()
    {
        return $this->hasMany(RESERVA::className(), ['idRESERVA' => 'RESERVA_idRESERVA'])->viaTable('RESERVA_has_MESA', ['MESA_numero_de_mesa' => 'numero_de_mesa']);
    }
}
