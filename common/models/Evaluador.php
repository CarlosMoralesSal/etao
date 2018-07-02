<?php

namespace common\models;

use Yii;
use \common\models\base\Evaluador as BaseEvaluador;

/**
 * This is the model class for table "evaluador".
 */
class Evaluador extends BaseEvaluador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nombre', 'apellidos', 'pais', 'profesion', 'lugar_de_trabajo', 'cargo', 'telefono'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
