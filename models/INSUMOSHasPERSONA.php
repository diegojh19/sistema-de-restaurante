<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "INSUMOS_has_PERSONA".
 *
 * @property int $INSUMOS_idINSUMOS
 * @property int $PERSONA_cedula
 *
 * @property INSUMOS $iNSUMOSIdINSUMOS
 * @property PERSONA $pERSONACedula
 */
class INSUMOSHasPERSONA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'INSUMOS_has_PERSONA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['INSUMOS_idINSUMOS', 'PERSONA_cedula'], 'required'],
            [['INSUMOS_idINSUMOS', 'PERSONA_cedula'], 'integer'],
            [['INSUMOS_idINSUMOS', 'PERSONA_cedula'], 'unique', 'targetAttribute' => ['INSUMOS_idINSUMOS', 'PERSONA_cedula']],
            [['INSUMOS_idINSUMOS'], 'exist', 'skipOnError' => true, 'targetClass' => INSUMOS::className(), 'targetAttribute' => ['INSUMOS_idINSUMOS' => 'idINSUMOS']],
            [['PERSONA_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => PERSONA::className(), 'targetAttribute' => ['PERSONA_cedula' => 'cedula']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'INSUMOS_idINSUMOS' => 'Insumos Id Insumos',
            'PERSONA_cedula' => 'Persona Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSUMOSIdINSUMOS()
    {
        return $this->hasOne(INSUMOS::className(), ['idINSUMOS' => 'INSUMOS_idINSUMOS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERSONACedula()
    {
        return $this->hasOne(PERSONA::className(), ['cedula' => 'PERSONA_cedula']);
    }
}
