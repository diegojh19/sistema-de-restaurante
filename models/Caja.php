<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property int $idCaja
 * @property string $fecha_caja
 * @property int $monto_inicial
 * @property int|null $monto_final
 * @property string|null $observacion
 * @property string $USUARIO_idusuario
 *
 * @property USUARIO $uSUARIOIdusuario
 */
class Caja extends \yii\db\ActiveRecord
{
    
    const ESTADO_CERRADA = "CERRADA";
    const ESTADO_ABIERTA = "ABIERTA";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_caja', 'monto_inicial', 'USUARIO_idusuario'], 'required'],
            [['fecha_caja'], 'safe'],
            [['estado'], 'string'],
            [['monto_inicial', 'monto_final'], 'integer'],
            [['observacion', 'USUARIO_idusuario'], 'string', 'max' => 255],
            [['USUARIO_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => USUARIO::className(), 'targetAttribute' => ['USUARIO_idusuario' => 'idusuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCaja' => 'Número Caja',
            'fecha_caja' => 'Fecha Caja',
            'monto_inicial' => 'Monto Inicial',
            'monto_final' => 'Monto Final',
            'observacion' => 'Observacion',
            'USUARIO_idusuario' => 'Usuario Idusuario',
        ];
    }

    /**
     * Gets query for [[USUARIOIdusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUSUARIOIdusuario()
    {
        return $this->hasOne(USUARIO::className(), ['idusuario' => 'USUARIO_idusuario']);
    }
}
