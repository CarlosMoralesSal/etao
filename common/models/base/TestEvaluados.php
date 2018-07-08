<?php

namespace common\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "test_evaluados".
 *
 * @property integer $id
 * @property integer $idtest_base
 * @property integer $idevaluador
 * @property string $nombre_configuracion
 * @property string $dispositivo_ent
 * @property integer $num_ensayos
 * @property integer $tiempo_maximo_de_ensayo
 * @property string $notas
 * @property integer $color_fondo_rojo
 * @property integer $color_fondo_verde
 * @property integer $color_fondo_azul
 * @property integer $tipo_ensayo_correcto
 * @property integer $tipo_ensayo_incorrecto
 * @property integer $tiempo_mensaje_correcto
 * @property integer $tiempo_mensaje_incorrecto
 * @property integer $fuente_mensaje_correcto
 * @property integer $fuente_mensaje_incorrecto
 * @property integer $estilo_mensaje_correcto
 * @property integer $estilo_mensaje_incorrecto
 * @property integer $alineacion_mensaje_correcto
 * @property integer $alineacion_mensaje_incorrecto
 * @property integer $alineacion_texto_mensaje_correcto
 * @property integer $alineacion_texto_mensaje_incorrecto
 * @property integer $color_mensaje_correcto_rojo
 * @property integer $color_mensaje_correcto_verde
 * @property integer $color_mensaje_correcto_azul
 * @property integer $color_mensaje_incorrecto_rojo
 * @property integer $color_mensaje_incorrecto_verde
 * @property integer $color_mensaje_incorrecto_azul
 * @property integer $color_texto_mensaje_correcto_rojo
 * @property integer $color_texto_mensaje_correcto_verde
 * @property integer $color_texto_mensaje_correcto_azul
 * @property integer $color_texto_mensaje_incorrecto_rojo
 * @property integer $color_texto_mensaje_incorrecto_verde
 * @property integer $color_texto_mensaje_incorrecto_azul
 * @property integer $sonido_mensaje_correcto
 * @property integer $sonido_mensaje_incorrecto
 * @property integer $barra_progreso
 * @property integer $tam_texto_mensaje_correcto
 * @property integer $tam_texto_mensaje_incorrecto
 * @property integer $tam_mensaje_correcto
 * @property integer $tam_mensaje_incorrecto
 * @property string $texto_mensaje_incorrecto
 * @property string $texto_mensaje_correcto
 * @property integer $tiempo_pausa
 * @property integer $publica
 *
 * @property \common\models\DetalleEvaluacion[] $detalleEvaluacions
 * @property \common\models\TestBase $testBase
 * @property \common\models\Evaluador $evaluador
 */
class TestEvaluados extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'detalleEvaluacions',
            'testBase',
            'evaluador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtest_base', 'idevaluador'], 'required'],
            [['idtest_base', 'idevaluador', 'num_ensayos', 'tiempo_maximo_de_ensayo', 'color_fondo_rojo', 'color_fondo_verde', 'color_fondo_azul', 'tipo_ensayo_correcto', 'tipo_ensayo_incorrecto', 'tiempo_mensaje_correcto', 'tiempo_mensaje_incorrecto', 'fuente_mensaje_correcto', 'fuente_mensaje_incorrecto', 'estilo_mensaje_correcto', 'estilo_mensaje_incorrecto', 'alineacion_mensaje_correcto', 'alineacion_mensaje_incorrecto', 'alineacion_texto_mensaje_correcto', 'alineacion_texto_mensaje_incorrecto', 'color_mensaje_correcto_rojo', 'color_mensaje_correcto_verde', 'color_mensaje_correcto_azul', 'color_mensaje_incorrecto_rojo', 'color_mensaje_incorrecto_verde', 'color_mensaje_incorrecto_azul', 'color_texto_mensaje_correcto_rojo', 'color_texto_mensaje_correcto_verde', 'color_texto_mensaje_correcto_azul', 'color_texto_mensaje_incorrecto_rojo', 'color_texto_mensaje_incorrecto_verde', 'color_texto_mensaje_incorrecto_azul', 'sonido_mensaje_correcto', 'sonido_mensaje_incorrecto', 'barra_progreso', 'tam_texto_mensaje_correcto', 'tam_texto_mensaje_incorrecto', 'tam_mensaje_correcto', 'tam_mensaje_incorrecto', 'tiempo_pausa', 'publica'], 'integer'],
            [['notas'], 'string'],
            [['nombre_configuracion', 'dispositivo_ent', 'texto_mensaje_incorrecto', 'texto_mensaje_correcto'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_evaluados';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idtest_base' => Yii::t('app', 'Idtest Base'),
            'idevaluador' => Yii::t('app', 'Idevaluador'),
            'nombre_configuracion' => Yii::t('app', 'Nombre Configuracion'),
            'dispositivo_ent' => Yii::t('app', 'Dispositivo Ent'),
            'num_ensayos' => Yii::t('app', 'Num Ensayos'),
            'tiempo_maximo_de_ensayo' => Yii::t('app', 'Tiempo Maximo De Ensayo'),
            'notas' => Yii::t('app', 'Notas'),
            'color_fondo_rojo' => Yii::t('app', 'Color Fondo Rojo'),
            'color_fondo_verde' => Yii::t('app', 'Color Fondo Verde'),
            'color_fondo_azul' => Yii::t('app', 'Color Fondo Azul'),
            'tipo_ensayo_correcto' => Yii::t('app', 'Tipo Ensayo Correcto'),
            'tipo_ensayo_incorrecto' => Yii::t('app', 'Tipo Ensayo Incorrecto'),
            'tiempo_mensaje_correcto' => Yii::t('app', 'Tiempo Mensaje Correcto'),
            'tiempo_mensaje_incorrecto' => Yii::t('app', 'Tiempo Mensaje Incorrecto'),
            'fuente_mensaje_correcto' => Yii::t('app', 'Fuente Mensaje Correcto'),
            'fuente_mensaje_incorrecto' => Yii::t('app', 'Fuente Mensaje Incorrecto'),
            'estilo_mensaje_correcto' => Yii::t('app', 'Estilo Mensaje Correcto'),
            'estilo_mensaje_incorrecto' => Yii::t('app', 'Estilo Mensaje Incorrecto'),
            'alineacion_mensaje_correcto' => Yii::t('app', 'Alineacion Mensaje Correcto'),
            'alineacion_mensaje_incorrecto' => Yii::t('app', 'Alineacion Mensaje Incorrecto'),
            'alineacion_texto_mensaje_correcto' => Yii::t('app', 'Alineacion Texto Mensaje Correcto'),
            'alineacion_texto_mensaje_incorrecto' => Yii::t('app', 'Alineacion Texto Mensaje Incorrecto'),
            'color_mensaje_correcto_rojo' => Yii::t('app', 'Color Mensaje Correcto Rojo'),
            'color_mensaje_correcto_verde' => Yii::t('app', 'Color Mensaje Correcto Verde'),
            'color_mensaje_correcto_azul' => Yii::t('app', 'Color Mensaje Correcto Azul'),
            'color_mensaje_incorrecto_rojo' => Yii::t('app', 'Color Mensaje Incorrecto Rojo'),
            'color_mensaje_incorrecto_verde' => Yii::t('app', 'Color Mensaje Incorrecto Verde'),
            'color_mensaje_incorrecto_azul' => Yii::t('app', 'Color Mensaje Incorrecto Azul'),
            'color_texto_mensaje_correcto_rojo' => Yii::t('app', 'Color Texto Mensaje Correcto Rojo'),
            'color_texto_mensaje_correcto_verde' => Yii::t('app', 'Color Texto Mensaje Correcto Verde'),
            'color_texto_mensaje_correcto_azul' => Yii::t('app', 'Color Texto Mensaje Correcto Azul'),
            'color_texto_mensaje_incorrecto_rojo' => Yii::t('app', 'Color Texto Mensaje Incorrecto Rojo'),
            'color_texto_mensaje_incorrecto_verde' => Yii::t('app', 'Color Texto Mensaje Incorrecto Verde'),
            'color_texto_mensaje_incorrecto_azul' => Yii::t('app', 'Color Texto Mensaje Incorrecto Azul'),
            'sonido_mensaje_correcto' => Yii::t('app', 'Sonido Mensaje Correcto'),
            'sonido_mensaje_incorrecto' => Yii::t('app', 'Sonido Mensaje Incorrecto'),
            'barra_progreso' => Yii::t('app', 'Barra Progreso'),
            'tam_texto_mensaje_correcto' => Yii::t('app', 'Tam Texto Mensaje Correcto'),
            'tam_texto_mensaje_incorrecto' => Yii::t('app', 'Tam Texto Mensaje Incorrecto'),
            'tam_mensaje_correcto' => Yii::t('app', 'Tam Mensaje Correcto'),
            'tam_mensaje_incorrecto' => Yii::t('app', 'Tam Mensaje Incorrecto'),
            'texto_mensaje_incorrecto' => Yii::t('app', 'Texto Mensaje Incorrecto'),
            'texto_mensaje_correcto' => Yii::t('app', 'Texto Mensaje Correcto'),
            'tiempo_pausa' => Yii::t('app', 'Tiempo Pausa'),
            'publica' => Yii::t('app', 'Publica'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleEvaluacions()
    {
        return $this->hasMany(\common\models\DetalleEvaluacion::className(), ['test_evaluado_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestBase()
    {
        return $this->hasOne(\common\models\TestBase::className(), ['id' => 'idtest_base']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluador()
    {
        return $this->hasOne(\common\models\Evaluador::className(), ['id' => 'idevaluador']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \common\models\TestEvaluadosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\TestEvaluadosQuery(get_called_class());
    }
}
