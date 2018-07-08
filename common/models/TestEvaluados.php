<?php

namespace common\models;

use Yii;
use \common\models\base\TestEvaluados as BaseTestEvaluados;

/**
 * This is the model class for table "test_evaluados".
 */
class TestEvaluados extends BaseTestEvaluados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['idtest_base', 'idevaluador'], 'required'],
            [['idtest_base', 'idevaluador', 'num_ensayos', 'tiempo_maximo_de_ensayo', 'color_fondo_rojo', 'color_fondo_verde', 'color_fondo_azul', 'tipo_ensayo_correcto', 'tipo_ensayo_incorrecto', 'tiempo_mensaje_correcto', 'tiempo_mensaje_incorrecto', 'fuente_mensaje_correcto', 'fuente_mensaje_incorrecto', 'estilo_mensaje_correcto', 'estilo_mensaje_incorrecto', 'alineacion_mensaje_correcto', 'alineacion_mensaje_incorrecto', 'alineacion_texto_mensaje_correcto', 'alineacion_texto_mensaje_incorrecto', 'color_mensaje_correcto_rojo', 'color_mensaje_correcto_verde', 'color_mensaje_correcto_azul', 'color_mensaje_incorrecto_rojo', 'color_mensaje_incorrecto_verde', 'color_mensaje_incorrecto_azul', 'color_texto_mensaje_correcto_rojo', 'color_texto_mensaje_correcto_verde', 'color_texto_mensaje_correcto_azul', 'color_texto_mensaje_incorrecto_rojo', 'color_texto_mensaje_incorrecto_verde', 'color_texto_mensaje_incorrecto_azul', 'sonido_mensaje_correcto', 'sonido_mensaje_incorrecto', 'barra_progreso', 'tam_texto_mensaje_correcto', 'tam_texto_mensaje_incorrecto', 'tam_mensaje_correcto', 'tam_mensaje_incorrecto', 'tiempo_pausa', 'publica'], 'integer'],
            [['notas'], 'string'],
            [['nombre_configuracion', 'dispositivo_ent', 'texto_mensaje_incorrecto', 'texto_mensaje_correcto'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
