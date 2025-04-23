<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_usuario".
 *
 * @property int $idTipoUsuario
 * @property string $nombre_tipo_usuario
 *
 * @property USUARIO[] $uSUARIOs
 */
class TipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTipoUsuario'], 'required'],
            [['idTipoUsuario'], 'integer'],
            [['nombre_tipo_usuario'], 'string', 'max' => 255],
            [['idTipoUsuario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipoUsuario' => 'Id Tipo Usuario',
            'nombre_tipo_usuario' => 'Nombre Tipo Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSUARIOs()
    {
        return $this->hasMany(USUARIO::className(), ['tipo_usuario_idperfil' => 'idTipoUsuario']);
    }
}
