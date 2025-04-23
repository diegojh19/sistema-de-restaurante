<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PLATO_FUERTE".
 *
 * @property int $idPLATO_FUERTE
 * @property string $nombre_plato_fuerte
 *
 * @property MENU[] $mENUs
 */
class PLATOFUERTE extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PLATO_FUERTE';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPLATO_FUERTE'], 'required'],
            [['idPLATO_FUERTE'], 'integer'],
            [['nombre_plato_fuerte'], 'string', 'max' => 20],
            [['idPLATO_FUERTE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPLATO_FUERTE' => 'Id Plato Fuerte',
            'nombre_plato_fuerte' => 'Nombre Plato Fuerte',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUs()
    {
        return $this->hasMany(MENU::className(), ['PLATO_FUERTE_idPLATO_FUERTE' => 'idPLATO_FUERTE']);
    }
}
