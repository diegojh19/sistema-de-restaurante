<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TIPO_PERSONA".
 *
 * @property int $idTIPO_PERSONA
 * @property string $nombre_tipo_persona
 *
 * @property PERSONA[] $pERSONAs
 */
class TIPOPERSONA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TIPO_PERSONA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTIPO_PERSONA'], 'required'],
            [['idTIPO_PERSONA'], 'integer'],
            [['nombre_tipo_persona'], 'string', 'max' => 20],
            [['idTIPO_PERSONA'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTIPO_PERSONA' => 'Id Tipo Persona',
            'nombre_tipo_persona' => 'Nombre Tipo Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERSONAs()
    {
        return $this->hasMany(PERSONA::className(), ['TIPO_PERSONA_idTIPO_PERSONA' => 'idTIPO_PERSONA']);
    }
}
