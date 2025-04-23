<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "RESERVA_has_MESA".
 *
 * @property int $MESA_numero_de_mesa
 * @property int $RESERVA_idRESERVA
 *
 * @property RESERVA $rESERVAIdRESERVA
 * @property MESA $mESANumeroDeMesa
 */
class RESERVAHasMESA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'RESERVA_has_MESA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MESA_numero_de_mesa', 'RESERVA_idRESERVA'], 'required'],
            [['MESA_numero_de_mesa', 'RESERVA_idRESERVA'], 'integer'],
            [['MESA_numero_de_mesa', 'RESERVA_idRESERVA'], 'unique', 'targetAttribute' => ['MESA_numero_de_mesa', 'RESERVA_idRESERVA']],
            [['RESERVA_idRESERVA'], 'exist', 'skipOnError' => true, 'targetClass' => RESERVA::className(), 'targetAttribute' => ['RESERVA_idRESERVA' => 'idRESERVA']],
            [['MESA_numero_de_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => MESA::className(), 'targetAttribute' => ['MESA_numero_de_mesa' => 'numero_de_mesa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MESA_numero_de_mesa' => 'Mesa Numero De Mesa',
            'RESERVA_idRESERVA' => 'Reserva Id Reserva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRESERVAIdRESERVA()
    {
        return $this->hasOne(RESERVA::className(), ['idRESERVA' => 'RESERVA_idRESERVA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMESANumeroDeMesa()
    {
        return $this->hasOne(MESA::className(), ['numero_de_mesa' => 'MESA_numero_de_mesa']);
    }
}
