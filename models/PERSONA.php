<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PERSONA".
 *
 * @property int $cedula
 * @property int $TIPO_PERSONA_idTIPO_PERSONA
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property int $telefono
 * @property string $estado_persona
 *
 * @property INSUMOSHasPERSONA[] $iNSUMOSHasPERSONAs
 * @property INSUMOS[] $iNSUMOSIdINSUMOSs
 * @property PEDIDOS[] $pEDIDOSs
 * @property PEDIDOS[] $pEDIDOSs0
 * @property PEDIDOS[] $pEDIDOSs1
 * @property TIPOPERSONA $tIPOPERSONAIdTIPOPERSONA
 * @property RESERVA[] $rESERVAs
 */
class PERSONA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PERSONA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula', 'TIPO_PERSONA_idTIPO_PERSONA'], 'required'],
            [['cedula', 'TIPO_PERSONA_idTIPO_PERSONA', 'telefono'], 'integer'],
            [['primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'estado_persona'], 'string', 'max' => 20],
            [['cedula'], 'unique'],
            [['TIPO_PERSONA_idTIPO_PERSONA'], 'exist', 'skipOnError' => true, 'targetClass' => TIPOPERSONA::className(), 'targetAttribute' => ['TIPO_PERSONA_idTIPO_PERSONA' => 'idTIPO_PERSONA']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cedula' => 'Cedula',
            'TIPO_PERSONA_idTIPO_PERSONA' => 'Tipo Persona Id Tipo Persona',
            'primer_nombre' => 'Primer Nombre',
            'segundo_nombre' => 'Segundo Nombre',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
            'telefono' => 'Telefono',
            'estado_persona' => 'Estado Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSUMOSHasPERSONAs()
    {
        return $this->hasMany(INSUMOSHasPERSONA::className(), ['PERSONA_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSUMOSIdINSUMOSs()
    {
        return $this->hasMany(INSUMOS::className(), ['idINSUMOS' => 'INSUMOS_idINSUMOS'])->viaTable('INSUMOS_has_PERSONA', ['PERSONA_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEDIDOSs()
    {
        return $this->hasMany(PEDIDOS::className(), ['PERSONA_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEDIDOSs0()
    {
        return $this->hasMany(PEDIDOS::className(), ['PERSONA_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPEDIDOSs1()
    {
        return $this->hasMany(PEDIDOS::className(), ['PERSONA_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPOPERSONAIdTIPOPERSONA()
    {
        return $this->hasOne(TIPOPERSONA::className(), ['idTIPO_PERSONA' => 'TIPO_PERSONA_idTIPO_PERSONA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRESERVAs()
    {
        return $this->hasMany(RESERVA::className(), ['PERSONA_cedula' => 'cedula']);
    }
}
