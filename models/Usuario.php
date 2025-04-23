<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "USUARIO".
 *
 * @property string $idusuario
 * @property string $nombre
 * @property string $apellido
 * @property int $tipo_usuario_idperfil
 * @property int $user_id
 *
 * @property TipoUsuario $tipoUsuarioIdperfil
 * @property User $user
 */
class USUARIO extends \yii\db\ActiveRecord
{
    public $username;
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'USUARIO';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idusuario', 'nombre', 'user_id'], 'required'],
            [['tipo_usuario_idperfil', 'user_id'], 'integer'],
            [['idusuario', 'nombre', 'apellido','username','password'], 'string', 'max' => 255],
            [['idusuario'], 'unique'],
            [['tipo_usuario_idperfil'], 'exist', 'skipOnError' => true, 'targetClass' => TipoUsuario::className(), 'targetAttribute' => ['tipo_usuario_idperfil' => 'idTipoUsuario']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Cédula',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'tipo_usuario_idperfil' => 'Perfil',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoUsuarioIdperfil()
    {
        return $this->hasOne(TipoUsuario::className(), ['idTipoUsuario' => 'tipo_usuario_idperfil']);
    }

    public function getTipoUsuario(){
        return $this->tipoUsuarioIdperfil->nombre_tipo_usuario;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getTotalName(){
        return $this->nombre." ".$this->apellido;
    }

    public function getCajaAbierta(){
        
        return Caja::find()->where(['USUARIO_idusuario' => $this->idusuario])
                                ->andWhere(['estado' => Caja::ESTADO_ABIERTA])
                                ->one();
    }
}
