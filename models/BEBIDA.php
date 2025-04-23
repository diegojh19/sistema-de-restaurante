<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "BEBIDA".
 *
 * @property int $idBEBIDA
 * @property string $nombre_bebida
 *
 * @property MENU[] $mENUs
 */
class BEBIDA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'BEBIDA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBEBIDA'], 'required'],
            [['idBEBIDA'], 'integer'],
            [['nombre_bebida'], 'string', 'max' => 20],
            [['idBEBIDA'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBEBIDA' => 'Id Bebida',
            'nombre_bebida' => 'Nombre Bebida',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUs()
    {
        return $this->hasMany(MENU::className(), ['BEBIDA_idBEBIDA' => 'idBEBIDA']);
    }
}
