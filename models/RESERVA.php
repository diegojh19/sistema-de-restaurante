<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "RESERVA".
 *
 * @property int $idRESERVA
 * @property int $SUCURSAL_idSUCURSAL
 * @property int $PERSONA_cedula
 * @property string $fecha_reserva
 * @property string $hora_reserva
 * @property string $estado_reserva
 *
 * @property PERSONA $pERSONACedula
 * @property SUCURSAL $sUCURSALIdSUCURSAL
 * @property RESERVAHasMESA[] $rESERVAHasMESAs
 * @property MESA[] $mESANumeroDeMesas
 */
class RESERVA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'RESERVA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRESERVA', 'SUCURSAL_idSUCURSAL', 'PERSONA_cedula'], 'required'],
            [['idRESERVA', 'SUCURSAL_idSUCURSAL', 'PERSONA_cedula'], 'integer'],
            [['fecha_reserva', 'hora_reserva'], 'safe'],
            [['estado_reserva'], 'string', 'max' => 20],
            [['idRESERVA'], 'unique'],
            [['PERSONA_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => PERSONA::className(), 'targetAttribute' => ['PERSONA_cedula' => 'cedula']],
            [['SUCURSAL_idSUCURSAL'], 'exist', 'skipOnError' => true, 'targetClass' => SUCURSAL::className(), 'targetAttribute' => ['SUCURSAL_idSUCURSAL' => 'idSUCURSAL']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRESERVA' => 'Id Reserva',
            'SUCURSAL_idSUCURSAL' => 'Sucursal Id Sucursal',
            'PERSONA_cedula' => 'Persona Cedula',
            'fecha_reserva' => 'Fecha Reserva',
            'hora_reserva' => 'Hora Reserva',
            'estado_reserva' => 'Estado Reserva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERSONACedula()
    {
        return $this->hasOne(PERSONA::className(), ['cedula' => 'PERSONA_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSUCURSALIdSUCURSAL()
    {
        return $this->hasOne(SUCURSAL::className(), ['idSUCURSAL' => 'SUCURSAL_idSUCURSAL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRESERVAHasMESAs()
    {
        return $this->hasMany(RESERVAHasMESA::className(), ['RESERVA_idRESERVA' => 'idRESERVA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMESANumeroDeMesas()
    {
        return $this->hasMany(MESA::className(), ['numero_de_mesa' => 'MESA_numero_de_mesa'])->viaTable('RESERVA_has_MESA', ['RESERVA_idRESERVA' => 'idRESERVA']);
    }
}
