<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $idciudad
 * @property string $nombre_ciudad
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idciudad', 'nombre_ciudad'], 'required'],
            [['idciudad'], 'integer'],
            [['nombre_ciudad'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idciudad' => 'Idciudad',
            'nombre_ciudad' => 'Nombre Ciudad',
        ];
    }
}
