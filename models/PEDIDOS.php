<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PEDIDOS".
 *
 * @property int $Idpedidos
 * @property int $MESA_numero_de_mesa
 * @property int $PERSONA_cedula
 * @property string $hora_comanda
 * @property string $fecha_comanda
 * @property string $estado_comanda
 *
 * @property DETALLEDECOMANDAS[] $dETALLEDECOMANDASs
 * @property MENU[] $mENUIdMENUs
 * @property FACTURA[] $fACTURAs
 * @property PERSONA $pERSONACedula
 * @property PERSONA $pERSONACedula0
 * @property PERSONA $pERSONACedula1
 * @property MESA $mESANumeroDeMesa
 */
class PEDIDOS extends \yii\db\ActiveRecord
{
    const PENDIENTE = 'PENDIENTE';
    const ENTREGADA = 'ENTREGADA';
    const FACTURADA = 'FACTURADA';

    public $pedidoDetails;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $TIPO_PERSONA_idTIPO_PERSONA;
    public $telefono;
    public $idMENU;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PEDIDOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MESA_numero_de_mesa'], 'required'],
            [['Idpedidos', 'MESA_numero_de_mesa', 'PERSONA_cedula','TIPO_PERSONA_idTIPO_PERSONA', 'telefono'], 'integer'],
            [['hora_comanda', 'fecha_comanda','idusuario'], 'safe'],
            [['estado_comanda'], 'string', 'max' => 20],
            [['primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','pedidoDetails'], 'string'],
            [['Idpedidos'], 'unique'],
            [['PERSONA_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => PERSONA::className(), 'targetAttribute' => ['PERSONA_cedula' => 'cedula']],
            [['PERSONA_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => PERSONA::className(), 'targetAttribute' => ['PERSONA_cedula' => 'cedula']],
            [['PERSONA_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => PERSONA::className(), 'targetAttribute' => ['PERSONA_cedula' => 'cedula']],
            [['MESA_numero_de_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => MESA::className(), 'targetAttribute' => ['MESA_numero_de_mesa' => 'numero_de_mesa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Idpedidos' => 'Número comanda',
            'MESA_numero_de_mesa' => ' Numero De Mesa',
            'PERSONA_cedula' => 'Persona Cedula',
            'hora_comanda' => 'Hora Comanda',
            'fecha_comanda' => 'Fecha Comanda',
            'estado_comanda' => 'Estado Comanda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDETALLEDECOMANDASs()
    {
        return $this->hasMany(DETALLEDECOMANDAS::className(), ['PEDIDOS_Idpedidos' => 'Idpedidos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUIdMENUs()
    {
        return $this->hasMany(MENU::className(), ['idMENU' => 'MENU_idMENU'])->viaTable('DETALLE_DE_COMANDAS', ['PEDIDOS_Idpedidos' => 'Idpedidos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFACTURAs()
    {
        return $this->hasMany(FACTURA::className(), ['PEDIDOS_Idpedidos' => 'Idpedidos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERSONACedula()
    {
        return $this->hasOne(PERSONA::className(), ['cedula' => 'PERSONA_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERSONACedula0()
    {
        return $this->hasOne(PERSONA::className(), ['cedula' => 'PERSONA_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERSONACedula1()
    {
        return $this->hasOne(PERSONA::className(), ['cedula' => 'PERSONA_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMESANumeroDeMesa()
    {
        return $this->hasOne(MESA::className(), ['numero_de_mesa' => 'MESA_numero_de_mesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(USUARIO::className(), ['idusuario' => 'USUARIO_usuarioId']);
    }

    public function getNombreUsuario(){
        return $this->usuario->totalName;
    }

    public function getValorTotal(){
        $total = 0;
        foreach (DETALLEDECOMANDAS::find()->where(['PEDIDOS_Idpedidos' => $this->Idpedidos])->all() as $current) {
            $total = $total + $current->valorTotal;
        }

        return $total;
    }

    public function getDetalles(){
        return DETALLEDECOMANDAS::find()->where(['PEDIDOS_Idpedidos' => $this->Idpedidos])->all();
    }
}
