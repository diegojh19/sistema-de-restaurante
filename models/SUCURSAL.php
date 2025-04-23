<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SUCURSAL".
 *
 * @property int $idSUCURSAL
 * @property string $nombre_Sucursal
 * @property string $ciudad_Sucursal
 * @property string $direccion_Sucursal
 *
 * @property RESERVA[] $rESERVAs
 */
class SUCURSAL extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'SUCURSAL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSUCURSAL'], 'required'],
            [['idSUCURSAL'], 'integer'],
            [['nombre_Sucursal', 'ciudad_Sucursal', 'direccion_Sucursal'], 'string', 'max' => 20],
            [['idSUCURSAL'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSUCURSAL' => 'Id Sucursal',
            'nombre_Sucursal' => 'Nombre Sucursal',
            'ciudad_Sucursal' => 'Ciudad Sucursal',
            'direccion_Sucursal' => 'Direccion Sucursal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRESERVAs()
    {
        return $this->hasMany(RESERVA::className(), ['SUCURSAL_idSUCURSAL' => 'idSUCURSAL']);
    }
}
