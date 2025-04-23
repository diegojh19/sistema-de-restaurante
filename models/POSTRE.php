<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "POSTRE".
 *
 * @property int $idPOSTRE
 * @property string $nombre_postre
 *
 * @property MENU[] $mENUs
 */
class POSTRE extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'POSTRE';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPOSTRE'], 'required'],
            [['idPOSTRE'], 'integer'],
            [['nombre_postre'], 'string', 'max' => 20],
            [['idPOSTRE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPOSTRE' => 'Id Postre',
            'nombre_postre' => 'Nombre Postre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUs()
    {
        return $this->hasMany(MENU::className(), ['POSTRE_idpostre' => 'idPOSTRE']);
    }
}
