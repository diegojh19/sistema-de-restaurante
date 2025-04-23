<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "INSUMOS".
 *
 * @property int $idINSUMOS
 * @property string $nombre
 * @property int $cantidad
 * @property int $precio
 * @property string $unidad_de_medida
 *
 * @property INSUMOSHasPERSONA[] $iNSUMOSHasPERSONAs
 * @property PERSONA[] $pERSONACedulas
 */
class INSUMOS extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'INSUMOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idINSUMOS'], 'required'],
            [['idINSUMOS', 'cantidad', 'precio'], 'integer'],
            [['nombre', 'unidad_de_medida'], 'string', 'max' => 20],
            [['idINSUMOS'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idINSUMOS' => 'Id Insumos',
            'nombre' => 'Nombre',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            'unidad_de_medida' => 'Unidad De Medida',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getINSUMOSHasPERSONAs()
    {
        return $this->hasMany(INSUMOSHasPERSONA::className(), ['INSUMOS_idINSUMOS' => 'idINSUMOS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERSONACedulas()
    {
        return $this->hasMany(PERSONA::className(), ['cedula' => 'PERSONA_cedula'])->viaTable('INSUMOS_has_PERSONA', ['INSUMOS_idINSUMOS' => 'idINSUMOS']);
    }
}
