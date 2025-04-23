<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ENTRADA".
 *
 * @property int $idsopa
 * @property string $nombre_entrada
 *
 * @property MENU[] $mENUs
 */
class ENTRADA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ENTRADA';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsopa'], 'required'],
            [['idsopa'], 'integer'],
            [['nombre_entrada'], 'string', 'max' => 20],
            [['idsopa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsopa' => 'Idsopa',
            'nombre_entrada' => 'Nombre Entrada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUs()
    {
        return $this->hasMany(MENU::className(), ['ENTRADA_idsopa' => 'idsopa']);
    }
}
